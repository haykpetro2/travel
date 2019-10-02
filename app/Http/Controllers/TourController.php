<?php

namespace App\Http\Controllers;

use App\Models\TourOrder;
use App\Models\TourType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\OrderTour;
use App\Models\Background;
use App\Models\Tour;

class TourController extends Controller
{
    public function index($country)
    {
        $tours = Tour::query()->where('country_id', $country)->orderByDesc('id')->paginate(5);
        $tour_types = TourType::query()->get();
        $background = Background::query()->where('page', 'tour')->first();
        return view('tour.index', compact('tours', 'tour_types', 'background'));
    }

    public function detail($id)
    {
        $tour = Tour::query()->find($id);
        $popular_tours = Tour::query()
            ->where('country_id', $tour->country->id)
            ->where('id', '!=', $tour->id)
            ->inRandomOrder()
            ->limit(3)
            ->get();
        return view('tour.detail', compact('tour', 'popular_tours'));
    }

    public function form($id)
    {
        $tour = Tour::query()->find($id);
        return view('tour.booking', compact('tour'));
    }

    public function total(Request $request)
    {
        $tour = Tour::query()->find($request->input('tour_id'));
        $total = 0;
        $child_age = 0;
        $tour_price = $tour->price;

        if ($tour->sale) {
            $tour_price = $tour_price - ($tour_price / 100) * $tour->sale;
        }

        if ($request->child_12) {
            $child_age = $request->child_12;
        }

        foreach ($tour->tour_hotels as $tour_hotel) {
            foreach ($tour_hotel->prices as $count => $price) {
                $count = explode('-', $count);
                if (isset($count[1])) {
                    settype($count[0], 'int');
                    settype($count[1], 'int');
                    if ($request->adult >= $count[0] && $request->adult <= $count[1]) {
                        $total = $total + ($request->adult * $tour_price) + ($request->adult * $price);
                        if ($child_age > 0) {
                            $total = $total + ($child_age * ($tour_price / 2 + $price));
                        }
                    }
                    continue;

                } else {
                    settype($count[0], 'int');
                    if ($request->adult == $count[0]) {
                        $total = $total + ($request->adult * $tour_price) + ($request->adult * $price);
                        if ($child_age > 0) {
                            $total = $total + ($child_age * ($tour_price / 2 + $price));
                        }
                    }
                }
            }
        }


        if ($request->promo_code) {
            $promo_code = $tour->promoCode->code;
            if (isset($promo_code) && $promo_code == $request->promo_code) {
                $promo_percent = $tour->promoCode->percent;
                $promo_price = ((($request->adult * $tour_price) + ($child_age * ($tour_price / 2))) / 100) * $promo_percent;
                $total = $total - $promo_price;
            }
        }

        $total = currency(round($total));

        return response()->json([
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
            'adult' => 'required',
        ]);


        if ($validator->fails()) {
            return response()->json([
                'errors' => 'Validator Error'
            ]);
        }

        $tour = Tour::query()->find($request->input('tour_id'));
        $total = 0;
        $child_age = 0;
        $tour_price = $tour->price;

        if ($tour->sale) {
            $tour_price = $tour_price - ($tour_price / 100) * $tour->sale;
        }

        if ($request->child_12) {
            $child_age = $request->child_12;
        }

        foreach ($tour->tour_hotels as $tour_hotel) {
            foreach ($tour_hotel->prices as $count => $price) {
                $count = explode('-', $count);
                if (isset($count[1])) {
                    settype($count[0], 'int');
                    settype($count[1], 'int');
                    if ($request->adult >= $count[0] && $request->adult <= $count[1]) {
                        $total = $total + ($request->adult * $tour_price) + ($request->adult * $price);
                        if ($child_age > 0) {
                            $total = $total + ($child_age * ($tour_price / 2 + $price));
                        }
                    }
                    continue;

                } else {
                    settype($count[0], 'int');
                    if ($request->adult == $count[0]) {
                        $total = $total + ($request->adult * $tour_price) + ($request->adult * $price);
                        if ($child_age > 0) {
                            $total = $total + ($child_age * ($tour_price / 2 + $price));
                        }
                    }
                }
            }
            $hotel = $tour_hotel->hotel;
        }

        if ($request->promo_code) {
            $promo_code = $tour->promoCode->code;
            if (isset($promo_code) && $promo_code == $request->promo_code) {
                $promo_percent = $tour->promoCode->percent;
                $promo_price = ((($request->adult * $tour_price) + ($child_age * ($tour_price / 2))) / 100) * $promo_percent;
                $total = $total - $promo_price;
            }
        }

        $total = currency(round($total));

        Mail::to(config('mail.username'))->queue(new OrderTour($request->all(), $tour->name_ru, $hotel->name_ru, $total));

        TourOrder::query()->create([
            'tour_id' => $tour->id,
            'hotel_id' => $hotel->id,
            'hotel_name' => $hotel->name_ru,
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'adult' => $request->input('adult'),
            'child_6' => $request->input('child_6'),
            'child_12' => $request->input('child_12'),
            'note' => $request->input('note'),
            'promo_code' => $request->input('promo_code'),
            'total' => $total
        ]);

        return response()->json([
            'success' => true,
        ]);

    }
}
