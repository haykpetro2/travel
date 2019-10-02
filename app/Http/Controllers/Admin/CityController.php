<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\CityGallery;
use App\Models\Comment;
use App\Models\Country;
use App\Models\HotelOrder;
use App\Models\HotelRoomPrice;
use App\Models\Season;
use App\Models\TourHotel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CityController extends Controller
{

    public function create()
    {
        $countries = Country::query()->get();
        return view('admin.country.create-city', compact('countries'));
    }

    public function store(Request $request)
    {

        $city = City::query()->create([
            'name_ru' => $request->input('name_ru'),
            'name_en' => $request->input('name_en'),
            'country_id' => $request->input('country_id'),
            'capital' => $request->input('capital'),
            'description_ru' => $request->input('description_ru'),
            'description_en' => $request->input('description_en'),
        ]);

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $fileName = time() + rand(1, 99999999) + rand(1, 99999999) + rand(1, 99999999) + rand(1, 99999999);
                $extension = $photo->getClientOriginalExtension();
                $photo->move(public_path('uploads/city/'), $fileName);
                imageConvert(public_path('uploads/city/'), $fileName, $extension);
                $gallery = new CityGallery();
                $gallery->city_id = $city->id;
                $gallery->name = $fileName . '.webp';
                $gallery->save();
            }
        }

        return redirect()->route('country.index');
    }

    public function show(\App\Models\City $city)
    {
        return view('admin.country.show-city', compact('city'));
    }

    public function edit(\App\Models\City $city)
    {
        $countries = Country::query()->get();
        return view('admin.country.edit-city', compact('city', 'countries'));
    }

    public function update(Request $request, \App\Models\City $city)
    {
        $city->update([
            'name_ru' => $request->input('name_ru'),
            'name_en' => $request->input('name_en'),
            'country_id' => $request->input('country_id'),
            'capital' => $request->input('capital'),
            'description_ru' => $request->input('description_ru'),
            'description_en' => $request->input('description_en'),
        ]);

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $fileName = time() + rand(1, 99999999) + rand(1, 99999999) + rand(1, 99999999) + rand(1, 99999999);
                $extension = $photo->getClientOriginalExtension();
                $photo->move(public_path('uploads/city/'), $fileName);
                imageConvert(public_path('uploads/city/'), $fileName, $extension);
                $gallery = new CityGallery();
                $gallery->city_id = $city->id;
                $gallery->name = $fileName . '.webp';
                $gallery->save();
            }
        }

        return redirect()->route('country.index');
    }

    public function photoDelete(Request $request)
    {
        $photo = CityGallery::query()->find($request->input('id'));
        try {
            File::delete('uploads/city/' . $photo->name);
        } catch (\Exception $e) {
        }
        $photo->delete();
        return response()->json([
            'success' => true,
            'id' => $request->input('id')
        ]);
    }

    public function destroy(\App\Models\City $city)
    {
        if (isset($city->hotels)) {
            foreach ($city->hotels as $hotel) {
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

                        HotelRoomPrice::query()->where('room_id', $room->id)->delete();
                        $room->delete();
                    }

                }

                Season::query()->where('hotel_id', $hotel->id)->delete();
                TourHotel::query()->where('hotel_id', $hotel->id)->delete();
                HotelOrder::query()->where('hotel_id', $hotel->id)->delete();
                Comment::query()->where('hotel_id', $hotel->id)->delete();
                try {
                    unlink(public_path('uploads/hotels/' . $hotel->image));
                } catch (\Exception $e) {
                }
                $hotel->delete();
            }
        }

        if (isset($city->photos)) {
            foreach ($city->photos as $photo) {
                try {
                    File::delete(public_path('uploads/city/' . $photo->name));
                } catch (\Exception $e) {
                }
                $photo->delete();
            }
        }

        $city->delete();

        return response()->json([
            'success' => true,
            'id' => $city->id
        ]);
    }

}
