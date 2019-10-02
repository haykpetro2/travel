<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Models\Hotel;
use App\Models\TourHotel;


class TourHotelController extends Controller
{

    public function show($id)
    {
        return view('admin.tours.create-tour-hotel', compact('id'));
    }

    public function store(Request $request)
    {

        foreach ($request->input('requestObj') as $key => $value) {
            $data = [];
            foreach ($value as $k => $v) {
                $data = array_add($data, $k, intval(json_decode($v)));
            }

            TourHotel::query()->create([
                'tour_id' => $request->input('tour_id'),
                'hotel_id' => intval(json_decode($key)),
                'prices' => $data
            ]);

        }
    }

    public function table(Request $request)
    {
        $hotels = Hotel::query()->get();
        $data = [
            'row' => $request->input('row'),
            'column' => $request->input('column')
        ];
        return View::make('admin.tours.table', compact('data', 'hotels'));

    }

    public function destroy(\App\Models\TourHotel $tourHotel)
    {
        $tourHotel->delete();
    }

}
