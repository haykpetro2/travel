<?php

namespace App\Http\Controllers\Admin;

use App\Models\HotelRoom;
use App\Models\HotelRoomGallery;
use App\Models\HotelRoomPrice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class HotelRoomController extends Controller
{

    public function create()
    {
        return view('admin.hotels.create-room');
    }

    public function store(Request $request)
    {

        $room = HotelRoom::query()->create([
            'hotel_id' => $request->input('hotel_id'),
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'sale' => $request->input('sale'),
            'count' => $request->input('count')
        ]);

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $fileName = time() + rand(1, 999999) + rand(1, 999999) + rand(1, 999999);
                $extension = $photo->getClientOriginalExtension();
                $photo->move(public_path('uploads/hotels/photos/'), $fileName);
                imageConvert(public_path('uploads/hotels/photos/'), $fileName, $extension);
                $gallery = new HotelRoomGallery();
                $gallery->hotel_room_id = $room->id;
                $gallery->name = $fileName . '.webp';
                $gallery->save();
            }
        }

        if ($request->has('settings')) {
            foreach ($request->input('settings') as $setting) {
                if ($setting['season_id'] != null && $setting['price'] != null) {
                    $room_price = new HotelRoomPrice();
                    $room_price->hotel_room_id = $room->id;
                    $room_price->season_id = $setting['season_id'];
                    $room_price->price = $setting['price'];
                    $room_price->save();
                }
            }
        }

        return redirect()->route('hotel.show', $request->input('hotel_id'));
    }

    public function show(\App\Models\HotelRoom $hotelRoom)
    {
        return view('admin.hotels.show-room', compact('hotelRoom'));
    }

    public function edit(\App\Models\HotelRoom $hotelRoom)
    {
        return view('admin.hotels.edit-room', compact('hotelRoom'));
    }

    public function update(Request $request, \App\Models\HotelRoom $hotelRoom)
    {
        $hotelRoom->update([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'sale' => $request->input('sale'),
            'count' => $request->input('count')
        ]);

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $fileName = time() + rand(1, 999999) + rand(1, 999999) + rand(1, 999999);
                $extension = $photo->getClientOriginalExtension();
                $photo->move(public_path('uploads/hotels/photos/'), $fileName);
                imageConvert(public_path('uploads/hotels/photos/'), $fileName, $extension);
                $gallery = new HotelRoomGallery();
                $gallery->hotel_room_id = $hotelRoom->id;
                $gallery->name = $fileName . '.webp';
                $gallery->save();
            }
        }

        if ($request->has('settings')) {
            HotelRoomPrice::query()->where('hotel_room_id', '=', $hotelRoom->id)->delete();
            foreach ($request->input('settings') as $setting) {
                if ($setting['season_id'] != null && $setting['price'] != null) {
                    $room_price = new HotelRoomPrice();
                    $room_price->hotel_room_id = $hotelRoom->id;
                    $room_price->season_id = $setting['season_id'];
                    $room_price->price = $setting['price'];
                    $room_price->save();
                }
            }
        }

        return redirect()->route('hotel-room.show', $hotelRoom->id);
    }

    public function photoDelete(Request $request)
    {

        $photo = HotelRoomGallery::query()->find($request->input('id'));
        try {
            File::delete(public_path('uploads/hotels/photos/' . $photo->name));
        } catch (\Exception $e) {
        }
        $photo->delete();

        return response()->json([
            'success' => true,
            'id' => $request->input('id')
        ]);

    }

    public function destroy(\App\Models\HotelRoom $hotelRoom)
    {

        HotelRoomPrice::query()->where('hotel_room_id', $hotelRoom->id)->delete();
        try {
            foreach ($hotelRoom->photos as $photo) {
                File::delete(public_path('uploads/hotels/photos/' . $photo->name));
                $photo->delete();
            }
        } catch (\Exception $e) {
        }

        $hotelRoom->delete();

    }

}
