<?php

namespace App\Http\Controllers\Admin;

use App\Models\ApartmentPrice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApartmentPriceController extends Controller
{


    public function store(Request $request)
    {
        foreach ($request->input('prices') as $price) {
            ApartmentPrice::query()->create([
                'apartment_id' => $request->input('apartment_id'),
                'day' => $price['day'],
                'price' => $price['price']
            ]);
        }
        return back();
    }


    public function destroy(\App\Models\ApartmentPrice $apartmentPrice)
    {
        $apartmentPrice->delete();
    }
}
