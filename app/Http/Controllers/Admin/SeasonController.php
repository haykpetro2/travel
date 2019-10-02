<?php

namespace App\Http\Controllers\Admin;

use App\Models\HotelRoomPrice;
use App\Models\Season;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeasonController extends Controller
{

    public function store(Request $request)
    {
        Season::query()->create([
            'hotel_id' => $request->input('hotel_id'),
            'name' => $request->input('name'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date')
        ]);
        return redirect()->route('hotel.show', $request->input('hotel_id'));
    }

    public function destroy(\App\Models\Season $season)
    {
        HotelRoomPrice::query()->where('season_id', $season->id)->delete();
        $season->delete();
    }


}
