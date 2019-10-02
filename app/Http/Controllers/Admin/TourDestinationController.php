<?php

namespace App\Http\Controllers\Admin;

use App\Models\TourDestination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TourDestinationController extends Controller
{

    public function show($id)
    {
        return view('admin.tours.create-tour-destination', compact('id'));
    }

    public function store(Request $request)
    {

        foreach ($request->destinations as $destination) {
            $tourDestination = TourDestination::query()->create([
                'tour_id' => $request->input('tour_id'),
                'title_ru' => $destination['title_ru'],
                'title_en' => $destination['title_en'],
                'day' => $destination['day'],
                'description_ru' => $destination['description_ru'],
                'description_en' => $destination['description_en'],
            ]);
            if (isset($destination['image'])) {
                $image = $destination['image'];
                $fileName = time() + rand(1, 99999999) + rand(1, 999999);
                $extension = $image->getClientOriginalExtension();
                $image->move(public_path('uploads/tours/destinations/'), $fileName);
                imageConvert(public_path('uploads/tours/destinations/'), $fileName, $extension);
                $tourDestination->image = $fileName . '.webp';
                $tourDestination->save();
            }
        }

        return redirect()->route('tour.show', $request->input('tour_id'));
    }

    public function edit(\App\Models\TourDestination $tourDestination)
    {
        return view('admin.tours.edit-tour-destination', compact('tourDestination'));
    }

    public function update(Request $request, \App\Models\TourDestination $tourDestination)
    {
        $tourDestination->update([
            'title_ru' => $request->input('title_ru'),
            'title_en' => $request->input('title_en'),
            'day' => $request->input('day'),
            'description_ru' => $request->input('description_ru'),
            'description_en' => $request->input('description_en'),

        ]);
        if ($request->hasFile('image')) {
            try {
                unlink(public_path('uploads/tours/destinations/' . $tourDestination->image));
            } catch (\Exception $e) {
            }

            $image = $request->file('image');
            $fileName = time() + rand(1, 99999999) + rand(1, 999999);
            $extension = $image->getClientOriginalExtension();
            $image->move(public_path('uploads/tours/destinations/'), $fileName);
            imageConvert(public_path('uploads/tours/destinations/'), $fileName, $extension);
            $tourDestination->image = $fileName . '.webp';
            $tourDestination->save();

        }
        return redirect()->route('tour.show', $tourDestination->tour_id);

    }

    public function destroy(\App\Models\TourDestination $tourDestination)
    {
        try {
            unlink(public_path('uploads/tours/destinations/' . $tourDestination->image));
        } catch (\Exception $e) {
        }
        $tourDestination->delete();
    }

}
