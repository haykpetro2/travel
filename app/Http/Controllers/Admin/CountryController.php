<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\Comment;
use App\Models\Country;
use App\Models\HotelOrder;
use App\Models\HotelRoomPrice;
use App\Models\Season;
use App\Models\TourHotel;
use App\Models\TourOrder;
use App\Models\TourPromoCode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CountryController extends Controller
{

    public function index()
    {
        $countries = Country::query()->orderByDesc('id')->paginate(10);
        $cities = City::query()->orderByDesc('id')->paginate(10);
        return view('admin.country.index', compact('countries', 'cities'));
    }

    public function create()
    {
        return view('admin.country.create-country');
    }

    public function store(Request $request)
    {
        $country = Country::query()->create([
            'name_ru' => $request->input('name_ru'),
            'name_en' => $request->input('name_en'),
            'description_ru' => $request->input('description_ru'),
            'description_en' => $request->input('description_en'),
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() + rand(1, 99999);
            $extension = $image->getClientOriginalExtension();
            $image->move(public_path('uploads/country/'), $fileName);
            imageConvert(public_path('uploads/country/'), $fileName, $extension);
            $country->image = $fileName . '.webp';
            $country->save();
        }

        return redirect()->route('country.index');
    }

    public function show(\App\Models\Country $country)
    {
        return view('admin.country.show-country', compact('country'));
    }

    public function edit(\App\Models\Country $country)
    {
        return view('admin.country.edit-country', compact('country'));
    }

    public function update(Request $request, \App\Models\Country $country)
    {

        $country->update([
            'name_ru' => $request->input('name_ru'),
            'name_en' => $request->input('name_en'),
            'description_ru' => $request->input('description_ru'),
            'description_en' => $request->input('description_en'),
        ]);

        if ($request->hasFile('image')) {
            try {
                File::delete(public_path('uploads/country/' . $country->image));
            } catch (\Exception $e) {
            }
            $image = $request->file('image');
            $fileName = time() + rand(1, 999999);
            $extension = $image->getClientOriginalExtension();
            $image->move(public_path('uploads/country/'), $fileName);
            imageConvert(public_path('uploads/country/'), $fileName, $extension);
            $country->image = $fileName . '.webp';
            $country->save();
        }
        return redirect()->route('country.index');
    }

    public function destroy(\App\Models\Country $country)
    {

        if (isset($country->cities)) {
            foreach ($country->cities as $city) {
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
            }
        }

        if (isset($country->hotels)) {
            foreach ($country->hotels as $hotel) {
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
                    File::delete(public_path('uploads/hotels/' . $hotel->image));
                } catch (\Exception $e) {
                }
                $hotel->delete();
            }
        }


        if (isset($country->tours)) {

            foreach ($country->tours as $tour) {
                TourHotel::query()->where('tour_id', $tour->id)->delete();
                TourPromoCode::query()->where('tour_id', $tour->id)->delete();
                TourOrder::query()->where('tour_id', $tour->id)->delete();
                Comment::query()->where('tour_id', $tour->id)->delete();

                if (isset($tour->destinations)) {
                    foreach ($tour->destinations as $destination) {
                        try {
                            File::delete('uploads/tours/destinations/' . $destination->image);
                        } catch (\Exception $e) {

                        }
                        $destination->delete();
                    }
                }
                try {
                    File::delete(public_path('uploads/tours/' . $tour->image));
                } catch (\Exception $e) {
                }
                $tour->delete();
            }
        }

        try {
            File::delete(public_path('uploads/country/' . $country->image));
        } catch (\Exception $e) {
        }
        $country->delete();

        return response()->json([
            'success' => true,
            'id' => $country->id
        ]);

    }

}
