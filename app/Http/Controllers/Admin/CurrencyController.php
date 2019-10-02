<?php

namespace App\Http\Controllers\Admin;

use App\Models\YouTube;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Background;
use App\Models\Condition;
use App\Models\Currency;
use App\Models\Subscriber;

class CurrencyController extends Controller
{

    public function index()
    {

        $currency = Currency::query()->first();
        $conditions = Condition::query()->get();
        $backgrounds = Background::query()->get();
        $subscribers = Subscriber::query()->orderByDesc('id')->get();
        $you_tube = YouTube::query()->first();
        return view('admin.other.index', compact('conditions', 'currency', 'backgrounds', 'subscribers', 'you_tube'));
    }


    public function store(Request $request)
    {
        Currency::query()->delete();
        Currency::query()->create([
            'amd' => $request->input('amd'),
            'rub' => $request->input('rub'),
            'usd' => $request->input('usd'),
            'euro' => $request->input('euro'),
        ]);
    }

}
