<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cookie;
use App\Mail\OrderTransport;
use Carbon\Carbon;
use App\Models\Transport;
use App\Models\Background;
use App\Models\TransportAttribute;
use App\Models\TransportOrder;

class TransportController extends Controller
{


    public function index()
    {
        $transports = Transport::query()->orderByDesc('id')->paginate(9);
        $background = Background::query()->where('page', 'transport')->first();
        return view('transport.index', compact('transports', 'background'));
    }

    public function detail($id)
    {
        $transport = Transport::query()->find($id);
        $popular_transports = Transport::query()
            ->where('type_id', $transport->type)
//            ->where('id', '!=', $transport->id)
            ->inRandomOrder()
            ->limit(3)
            ->get();
        return view('transport.detail', compact('transport','popular_transports'));
    }

    public function total(Request $request)
    {
        $transport = Transport::query()->find($request->input('id'));
        $total = 0;

        if ($request->has('attr')) {
            foreach ($request->input('attr') as $attribute) {
                $attrPrice = TransportAttribute::select('price')->where('id', $attribute)->firstOrFail();
                $total += $attrPrice->price;
            }
        }

        $difference = false;

        if ($request->input('check_in') && $request->input('check_out')) {
            $check_in = new Carbon($request->input('check_in'));
            $check_out = new Carbon($request->input('check_out'));
            $difference = $check_in->diffInDays($check_out);
        }

        if ($difference) {

            $price = $transport->price;
            foreach ($transport->prices as $prices) {
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
            $price = $transport->price;
        }

        $total += $price;

        if ($transport->sale) {
            $total = $total - (($total / 100) * $transport->sale);
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
            'check_out' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => 'Validator Error'
            ]);
        }


        $transport = Transport::query()->find($request->input('transport_id'));
        $total = 0;

        if ($request->has('attr')) {
            foreach ($request->input('attr') as $attribute) {
                $attrPrice = TransportAttribute::select('price')->where('id', $attribute)->firstOrFail();
                $total += $attrPrice->price;
            }
        }

        $difference = false;

        if ($request->input('check_in') && $request->input('check_out')) {
            $check_in = new Carbon($request->input('check_in'));
            $check_out = new Carbon($request->input('check_out'));
            $difference = $check_in->diffInDays($check_out);
        }

        if ($difference) {

            $price = $transport->price;
            foreach ($transport->prices as $prices) {
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
            $price = $transport->price;
        }

        $total += $price;
        if ($transport->sale) {
            $total = $total - (($total / 100) * $transport->sale);
        }
        $total = currency(round($total));

        Mail::to(config('mail.username'))->send(new OrderTransport($request->all(), $transport->name_ru, $total));

        TransportOrder::query()->create([
            'transport_id' => $request->input('transport_id'),
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
