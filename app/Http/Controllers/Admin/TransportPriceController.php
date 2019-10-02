<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TransportPrice;

class TransportPriceController extends Controller
{
    public function store(Request $request)
    {
        foreach ($request->input('pricing') as $item) {

            $transport_price = new TransportPrice();
            $transport_price->transport_id = $request->input('transport_id');
            $transport_price->day = $item['day'];
            $transport_price->price = $item['price'];
            $transport_price->save();
        }

        return redirect()->route('transport.show', $request->input('transport_id'));

    }

    public function destroy(\App\Models\TransportPrice $transportPrice)
    {
        $transportPrice->delete();
    }

}
