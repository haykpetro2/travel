<?php

namespace App\Http\Controllers;


use App\Models\ExcursionOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cookie;
use App\Mail\OrderExcursion;
use App\Models\Background;
use App\Models\Excursion;


class ExcursionController extends Controller
{

    public function index(Request $request)
    {
        $background = Background::query()->where('page', 'excursion')->first();
        if ($request->method() == 'POST') {
            $filter = $request->input('filter');
            $excursions = Excursion::query()
                ->where('name_en', 'LIKE', $filter . '%')
                ->orWhere('name_ru', 'LIKE', $filter . '%')
                ->paginate(10);
        } else {
            $excursions = Excursion::query()->orderByDesc('id')->paginate(10);
        }
        return view('excursion.index', compact('excursions', 'background'));
    }

    public function detail($id)
    {
        $excursion = Excursion::query()->find($id);
        return view('excursion.detail', compact('excursion'));
    }

    public function total(Request $request)
    {
        $excursion = Excursion::query()->find($request->input('excursion_id'));
        $person_count = $request->input('person');
        $total = 0;
        if ($person_count < 6) {
            $total = $excursion->price;
        } else {
            $total = $excursion->other_price;
        }

        if ($excursion->sale) {
            $total = $total - (($total / 100) * $excursion->sale);
        }
        $ticket = $person_count * $excursion->ticket;
        $total += $ticket;
        $total += ($total * $excursion->percent / 100);
        $total += $person_count * $excursion->addition;

        if ($request->has('guide')) {
            if ($request->input('guide') == 'yes') {
                $total += $excursion->guide;
            }
        }
        if ($request->has('lunch')) {
            if ($request->input('lunch') == 'yes') {
                $total += $excursion->lunch;
            }
        }

        if ($excursion->sale) {
            $total = $total - (($total / 100) * $excursion->sale);
        }

        $per_person = round($total / $person_count);

        return response()->json([
            'success' => true,
            'total' => currency($total),
            'per_person' => currency($per_person)
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

        $excursion = Excursion::query()->find($request->input('excursion_id'));
        $person_count = $request->input('person');
        $total = 0;
        if ($person_count < 6) {
            $total = $excursion->price;
        } else {
            $total = $excursion->other_price;
        }
        if ($excursion->sale) {
            $total = $total - (($total / 100) * $excursion->sale);
        }

        $ticket = $person_count * $excursion->ticket;
        $total += $ticket;
        $total += ($total * $excursion->percent / 100);
        $total += $person_count * $excursion->addition;

        if ($request->has('guide')) {
            if ($request->input('guide') == 'yes') {
                $total += $excursion->guide;
            }
        }
        if ($request->has('lunch')) {
            if ($request->input('lunch') == 'yes') {
                $total += $excursion->lunch;
            }
        }
        $total = currency($total);
        $per_person = currency(round($total / $person_count));


        Mail::to(config('mail.username'))->send(new OrderExcursion($request->all(), $excursion->name_ru, $total, $per_person));

        ExcursionOrder::query()->create([
            'excursion_id' => $request->input('excursion_id'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'check_in' => $request->input('check_in'),
            'check_out' => $request->input('check_out'),
            'person' => $request->input('person'),
            'lunch' => $request->input('lunch'),
            'guide' => $request->input('guide'),
            'note' => $request->input('note'),
            'total' => $total,
            'per_person' => $per_person,
        ]);

        return response()->json([
            'success' => true
        ]);
    }
}
