<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use App\Models\Country;
use App\Models\Expert;
use App\Models\Tour;
use App\Models\TourDestination;
use App\Models\TourHotel;
use App\Models\TourOrder;
use App\Models\TourPromoCode;
use App\Models\TourType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TourController extends Controller
{

    public function index()
    {
        $tours = Tour::query()->orderByDesc('id')->paginate(10);
        $experts = Expert::query()->orderByDesc('id')->get();
        $tour_types = TourType::query()->orderByDesc('id')->get();
        return view('admin.tours.index', compact('tours', 'experts', 'tour_types'));
    }

    public function create()
    {
        $countries = Country::query()->get();
        $experts = Expert::query()->get();
        $tour_types = TourType::query()->get();
        return view('admin.tours.create-tour', compact('countries', 'experts', 'tour_types'));
    }

    public function store(Request $request)
    {
        $tour = Tour::query()->create([
            'home' => $request->input('home'),
            'type' => $request->input('type'),
            'country_id' => $request->input('country_id'),
            'name_ru' => $request->input('name_ru'),
            'name_en' => $request->input('name_en'),
            'tour_type_id' => $request->input('tour_type_id'),
            'price' => $request->input('price'),
            'expert_id' => $request->input('expert_id'),
            'sale' => $request->input('sale'),
            'short_description_ru' => $request->input('short_description_ru'),
            'short_description_en' => $request->input('short_description_en'),
            'description_ru' => $request->input('description_ru'),
            'description_en' => $request->input('description_en'),
        ]);

        TourPromoCode::query()->create([
            'tour_id' => $tour->id,
        ]);

        if ($request->has('checks')) {
            $tour->checks = $request->checks;
            $tour->save();
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() + rand(1, 99999);
            $extension = $image->getClientOriginalExtension();
            $image->move(public_path('uploads/tours/'), $fileName);
            imageConvert(public_path('uploads/tours/'), $fileName, $extension);
            $tour->image = $fileName . '.webp';
            $tour->save();
        }

        return redirect()->route('tour.show', $tour->id);
    }

    public function show(\App\Models\Tour $tour)
    {
        $comments = Comment::query()->where('tour_id', $tour->id)->get();
        return view('admin.tours.show-tour', compact('tour', 'comments'));
    }

    public function edit(\App\Models\Tour $tour)
    {
        $countries = Country::query()->get();
        $experts = Expert::query()->get();
        $tour_types = TourType::query()->get();
        return view('admin.tours.edit-tour', compact('tour', 'countries', 'experts', 'tour_types'));
    }

    public function update(Request $request, \App\Models\Tour $tour)
    {
        $tour->update([
            'home' => $request->input('home'),
            'type' => $request->input('type'),
            'country_id' => $request->input('country_id'),
            'name_ru' => $request->input('name_ru'),
            'name_en' => $request->input('name_en'),
            'tour_type_id' => $request->input('tour_type_id'),
            'price' => $request->input('price'),
            'expert_id' => $request->input('expert_id'),
            'sale' => $request->input('sale'),
            'short_description_ru' => $request->input('short_description_ru'),
            'short_description_en' => $request->input('short_description_en'),
            'description_ru' => $request->input('description_ru'),
            'description_en' => $request->input('description_en'),
        ]);

        if ($request->has('checks')) {
            $tour->checks = $request->input('checks');
            $tour->save();
        }
        if ($request->hasFile('image')) {

            try {
                unlink(public_path('uploads/tours/' . $tour->image));
            } catch (\Exception $e) {
            }

            $image = $request->file('image');
            $fileName = time() + rand(1, 99999);
            $extension = $image->getClientOriginalExtension();
            $image->move(public_path('uploads/tours/'), $fileName);
            imageConvert(public_path('uploads/tours/'), $fileName, $extension);
            $tour->image = $fileName . '.webp';
            $tour->save();

        }

        return redirect()->route('tour.show', $tour->id);

    }

    public function promoCode(Request $request)
    {
        TourPromoCode::query()
            ->where('tour_id', $request->input('tour_id'))
            ->update([
                'code' => $request->input('code'),
                'percent' => $request->input('percent')
            ]);
    }

    public function destroy(\App\Models\Tour $tour)
    {
        TourHotel::query()->where('tour_id', $tour->id)->delete();
        TourPromoCode::query()->where('tour_id', $tour->id)->delete();
        TourOrder::query()->where('tour_id', $tour->id)->delete();
        Comment::query()->where('tour_id', $tour->id)->delete();

        if (isset($tour->destinations)) {
            foreach ($tour->destinations as $destination) {
                try {
                    unlink('uploads/tours/destinations/' . $destination->image);
                } catch (\Exception $e) {

                }
                $destination->delete();
            }
        }
        try {
            unlink(public_path('uploads/tours/' . $tour->image));
        } catch (\Exception $e) {
        }

        $tour->delete();

    }

}
