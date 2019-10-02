<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\Comment;
use App\Models\Country;
use App\Models\Hotel;
use App\Models\HotelOrder;
use App\Models\HotelRoom;
use App\Models\HotelRoomPrice;
use App\Models\Season;
use App\Models\TourHotel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class HotelController extends Controller
{

    public function index()
    {
        $hotels = Hotel::query()->orderByDesc('id')->paginate(10);
        return view('admin.hotels.index', compact('hotels'));
    }

    public function create()
    {
        $countries = Country::query()->get();
        return view('admin.hotels.create-hotel', compact('countries'));
    }

    public function change(Request $request)
    {
        $cities = City::query()->where('country_id', '=', $request->id)->get();
        return response()->json([
            'cities' => $cities
        ]);

    }

    public function store(Request $request)
    {

        $hotel = Hotel::query()->create([

            'home' => $request->input('home'),
            'country_id' => $request->input('country_id'),
            'city_id' => $request->input('city_id'),
            'name_ru' => $request->input('name_ru'),
            'name_en' => $request->input('name_en'),
            'type' => $request->input('type'),
            'star' => $request->input('star'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'short_description_ru' => $request->input('short_description_ru'),
            'short_description_en' => $request->input('short_description_en'),
            'description_ru' => $request->input('description_ru'),
            'description_en' => $request->input('description_en'),
        ]);

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $fileName = time() + rand(1, 99999);
            $extension = $image->getClientOriginalExtension();
            $image->move(public_path('uploads/hotels/'), $fileName);
            imageConvert(public_path('uploads/hotels/'), $fileName, $extension);
            $hotel->image = $fileName . '.webp';
            $hotel->save();

        }

        return redirect()->route('hotel.show', $hotel->id);
    }

    public function show(\App\Models\Hotel $hotel)
    {
        return view('admin.hotels.show-hotel', compact('hotel'));
    }

    public function edit(\App\Models\Hotel $hotel)
    {
        $countries = Country::query()->get();
        return view('admin.hotels.edit-hotel', compact('countries', 'hotel'));
    }

    public function update(Request $request, \App\Models\Hotel $hotel)
    {
        $hotel->update([
            'home' => $request->input('home'),
            'country_id' => $request->input('country_id'),
            'city_id' => $request->input('city_id'),
            'name_ru' => $request->input('name_ru'),
            'name_en' => $request->input('name_en'),
            'type' => $request->input('type'),
            'star' => $request->input('star'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'short_description_ru' => $request->input('short_description_ru'),
            'short_description_en' => $request->input('short_description_en'),
            'description_ru' => $request->input('description_ru'),
            'description_en' => $request->input('description_en'),
        ]);

        if ($request->hasFile('image')) {
            try {
                File::delete(public_path('uploads/hotels/' . $hotel->image));
            } catch (\Exception $e) {
            }

            $image = $request->file('image');
            $fileName = time() + rand(1, 99999);
            $extension = $image->getClientOriginalExtension();
            $image->move(public_path('uploads/hotels/'), $fileName);
            imageConvert(public_path('uploads/hotels/'), $fileName, $extension);
            $hotel->image = $fileName . '.webp';
            $hotel->save();
        }
        return redirect()->route('hotel.show', $hotel->id);

    }

    public function destroy(\App\Models\Hotel $hotel)
    {

        if (isset($hotel->rooms)) {
            foreach ($hotel->rooms as $room) {
                if (isset($room->photos)) {
                    foreach ($room->photos as $photo) {
                        try {
                            File::delete(public_path('uploads/hotels/photos/' . $photo->name));
                        } catch (\Exception $e) {
                        }
                        $photo->delete();
                    }
                }
                HotelRoomPrice::query()->where('hotel_room_id', $room->id)->delete();
                $room->delete();
            }
        }

        Season::query()->where('hotel_id', $hotel->id)->delete();
        TourHotel::query()->where('hotel_id', $hotel->id)->delete();
        HotelOrder::query()->where('hotel_id', $hotel->id)->delete();
        Comment::query()->where('hotel_id', $hotel->id)->delete();

        try {
            File::delete(public_path('uploads/hotels/' . $hotel->image));
        } catch (\Exception $e) {
        }
        $hotel->delete();

        return response()->json([
            'success' => true,
            'id' => $hotel->id,
        ]);
    }

}
