<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

use App\Mail\OrderHotel;
use App\Models\Background;
use App\Models\Hotel;
use App\Models\HotelOrder;
use App\Models\HotelRoom;
use App\Models\HotelRoomGallery;
use App\Models\HotelRoomPrice;
use App\Models\Season;

class HotelController extends Controller
{

    public function index($country, $city = false)
    {
        $data = [];

        $data['country_id'] = $country;

        if ($city) {
            $data['city_id'] = $city;
        }

        $hotels = Hotel::query()->where($data)->orderByDesc('id')->paginate(5);

        $background = Background::query()->where('page', 'hotel')->first();

        return view('hotel.index', compact('hotels', 'background'));

    }

    public function detail($id)
    {
        $hotel = Hotel::query()->find($id);
        $popular_hotels = Hotel::query()
            ->where('country_id', $hotel->country->id)
            ->where('id', '!=', $hotel->id)
            ->inRandomOrder()
            ->limit(3)
            ->get();
        return view('hotel.detail', [
            'hotel' => $hotel,
        ] , compact('popular_hotels'));
    }

    public function form($id)
    {
        $room = HotelRoom::query()->find($id);
        $background = HotelRoomGallery::query()->where('hotel_room_id', $room->id)->inRandomOrder()->firstOrFail();
        return view('hotel.booking', compact('room', 'background'));
    }

    public function total(Request $request)
    {

        $total = 0;
        $check_in = Carbon::parse($request->check_in)->format('Y-m-d');
        $check_out = Carbon::parse($request->check_out)->format('Y-m-d');
        if ($check_out > $check_in) {
            $season = Season::query()->where(function ($q) use ($check_in, $check_out) {
                $q->where('start_date', '<=', $check_in)
                    ->where('end_date', '>=', $check_out);
            })->first();

            if ($season) {
                $room_price = HotelRoomPrice::query()
                    ->where('hotel_room_id', $request->input('room_id'))
                    ->where('season_id', $season->id)->firstOrFail();
                $check_in = new Carbon($request->check_in);
                $check_out = new Carbon($request->check_out);
                $day = $check_in->diffInDays($check_out) + 1;
                $total = $total + ($day * $room_price->price);

            } else {
                if (isset($check_in)) {
                    $test_start = Season::query()->where(function ($q) use ($check_in) {
                        $q->where('start_date', '<=', $check_in)
                            ->where('end_date', '>=', $check_in);
                    })->first();
                    if ($test_start) {
                        $room_price = HotelRoomPrice::query()
                            ->where('hotel_room_id', $request->input('room_id'))
                            ->where('season_id', $test_start->id)->firstOrFail();
                        $check_in = new Carbon($request->check_in);
                        $end_date = new Carbon($test_start->end_date);
                        $day = $check_in->diffInDays($end_date) + 1;
                        $total = $total + ($day * $room_price->price);
                    }
                }
                if (isset($check_out)) {
                    $test_end = Season::query()->where(function ($q) use ($check_out) {
                        $q->where('start_date', '<=', $check_out)
                            ->where('end_date', '>=', $check_out);
                    })->first();
                    if ($test_end) {
                        $room_price = HotelRoomPrice::query()
                            ->where('hotel_room_id', $request->input('room_id'))
                            ->where('season_id', $test_end->id)->firstOrFail();
                        $check_out = new Carbon($request->check_out);
                        $start_date = new Carbon($test_end->start_date);
                        $day = $start_date->diffInDays($check_out) + 1;
                        $total = $total + ($day * $room_price->price);
                    }
                }
            }
        } else {
            return response([
                'error' => true,
                'total' => $total
            ]);
        }

        $total = currency($total);
        return response([
            'success' => true,
            'total' => $total
        ]);
    }

    public function booking(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'check_in' => 'required|date',
            'check_out' => 'required|date',
            'person' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => 'Validator Error'
            ]);
        }


        $total = 0;
        $check_in = Carbon::parse($request->check_in)->format('Y-m-d');
        $check_out = Carbon::parse($request->check_out)->format('Y-m-d');

        $season = Season::query()->where(function ($q) use ($check_in, $check_out) {
            $q->where('start_date', '<=', $check_in)
                ->where('end_date', '>=', $check_out);
        })->first();
        if ($season) {
            $room_price = HotelRoomPrice::query()
                ->where('hotel_room_id', $request->input('room_id'))
                ->where('season_id', $season->id)->firstOrFail();
            $check_in = new Carbon($request->check_in);
            $check_out = new Carbon($request->check_out);
            $day = $check_in->diffInDays($check_out) + 1;
            $total = $total + ($day * $room_price->price);

        } else {
            if (isset($check_in)) {
                $test_start = Season::query()->where(function ($q) use ($check_in) {
                    $q->where('start_date', '<=', $check_in)
                        ->where('end_date', '>=', $check_in);
                })->first();
                if ($test_start) {
                    $room_price = HotelRoomPrice::query()
                        ->where('hotel_room_id', $request->input('room_id'))
                        ->where('season_id', $test_start->id)->firstOrFail();
                    $check_in = new Carbon($request->check_in);
                    $end_date = new Carbon($test_start->end_date);
                    $day = $check_in->diffInDays($end_date) + 1;
                    $total = $total + ($day * $room_price->price);
                }
            }
            if (isset($check_out)) {
                $test_end = Season::query()->where(function ($q) use ($check_out) {
                    $q->where('start_date', '<=', $check_out)
                        ->where('end_date', '>=', $check_out);
                })->first();
                if ($test_end) {
                    $room_price = HotelRoomPrice::query()
                        ->where('hotel_room_id', $request->input('room_id'))
                        ->where('season_id', $test_end->id)->firstOrFail();
                    $check_out = new Carbon($request->check_out);
                    $start_date = new Carbon($test_end->start_date);
                    $day = $start_date->diffInDays($check_out) + 1;
                    $total = $total + ($day * $room_price->price);
                }
            }
        }

        $room = HotelRoom::query()->find($request->input('room_id'));
        $total = currency($total);

        Mail::to(config('mail.username'))->queue(new OrderHotel($request->all(), $room->hotel->name_ru, $room->name, $total));

        HotelOrder::query()->create([
            'hotel_id' => 1,
            'room_id' => $room->id,
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'check_in' => $request->input('check_in'),
            'check_out' => $request->input('check_out'),
            'person' => $request->input('person'),
            'note' => $request->input('note'),
            'total' => $total,
        ]);

        return response()->json([
            'success' => true,
        ]);

    }
}
