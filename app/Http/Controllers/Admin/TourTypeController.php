<?php

namespace App\Http\Controllers\Admin;

use App\Models\TourType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class TourTypeController extends Controller
{
    public function store(Request $request)
    {

        TourType::query()->create([
            'name_ru' => $request->input('name_ru'),
            'name_en' => $request->input('name_en'),
        ]);


    }

    public function update(Request $request, \App\Models\TourType $tourType)
    {

        $tourType->update([
            'name_ru' => $request->input('name_ru'),
            'name_en' => $request->input('name_en'),
        ]);

    }

    public function destroy(\App\Models\TourType $tourType)
    {
        $tourType->delete();
    }

}
