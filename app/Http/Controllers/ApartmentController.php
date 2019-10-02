<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Mail\OrderApartment;
use App\Models\ApartmentOrder;
use App\Models\Apartment;
use App\Models\Background;


class ApartmentController extends Controller
{

    public function index()
    {
        $apartments = Apartment::query()->orderByDesc('id')->paginate(1);
        $background = Background::query()->where('page', 'apartment')->first();
        return view('apartment.index', compact('apartments', 'background'));
    }

    public function detail($id)
    {
        $apartment = Apartment::query()->find($id);
        $popular_apartments = Apartment::query()
            ->where('type', $apartment->type)
            ->where('id', '!=', $apartment->id)
            ->inRandomOrder()
            ->limit(3)
            ->get();
        return view('apartment.detail', compact('apartment','popular_apartments'));
    }

    public function total(Request $request)
    {
        $apartment = Apartment::query()->find($request->input('id'));
        $total = 0;

        $difference = false;

        if ($request->input('check_in') && $request->input('check_out')) {
            $check_in = new Carbon($request->input('check_in'));
            $check_out = new Carbon($request->input('check_out'));
            $difference = $check_in->diffInDays($check_out);
        }
        if ($difference) {
            $price = $apartment->price;
            foreach ($apartment->prices as $prices) {

                $day = $prices->day;
                $day = explode('-', $day);

                if (isset($day[1])) {
                    settype($day[0], 'int');
                    settype($day[1], 'int');

                    if ($difference >= $day[0] && $difference <= $day[1]) {
                        $price = $prices->price;
                        break;
                    }
                } else {
                    settype($day[0], 'int');
                    if ($difference == $day[0]) {
                        $price = $prices->price;
                        break;
                    }
                }
            }

            $price = $price * $difference;
        } else {
            $price = $apartment->price;
        }

        $total += $price;

        if ($apartment->sale) {
            $total = $total - (($total / 100) * $apartment->sale);
        }

        $total = currency(round($total));

        return response()->json([
            'success' => true,
            'total' => $total,
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
            'check_out' => 'required|date'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => 'Validator Error'
            ]);
        }

        $apartment = Apartment::query()->find($request->input('apartment_id'));
        $total = 0;
        $check_in = new Carbon($request->input('check_in'));
        $check_out = new Carbon($request->input('check_out'));
        $difference = $check_in->diffInDays($check_out);

        if ($difference) {
            $price = $apartment->price;
            foreach ($apartment->prices as $prices) {
                $day = $prices->day;
                $day = explode('-', $day);
                if (isset($day[1])) {
                    settype($day[0], 'int');
                    settype($day[1], 'int');

                    if ($difference >= $day[0] && $difference <= $day[1]) {
                        $price = $prices->price;
                        break;
                    }
                } else {
                    settype($day[0], 'int');
                    if ($difference == $day[0]) {
                        $price = $prices->price;
                        break;
                    }
                }
            }
            $price = $price * $difference;
        } else {
            $price = $apartment->price;
        }

        $total += $price;

        $total = currency(round($total));

        Mail::to(config('mail.username'))->send(new OrderApartment($request->all(), $apartment->name_ru, $total));

        ApartmentOrder::query()->create([
            'apartment_id' => $apartment->id,
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'check_in' => $request->input('check_in'),
            'check_out' => $request->input('check_out'),
            'note' => $request->input('note'),
            'total' => $total,
        ]);

        return response()->json([
            'success' => true
        ]);
    }

}
