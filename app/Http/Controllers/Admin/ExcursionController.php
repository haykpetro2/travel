<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\Excursion;
use App\Models\ExcursionGallery;
use App\Models\ExcursionOrder;


class ExcursionController extends Controller
{

    public function index()
    {
        $excursions = Excursion::query()->orderByDesc('id')->paginate(10);
        return view('admin.excursion.index', compact('excursions'));
    }

    public function create()
    {
        return view('admin.excursion.create');
    }

    public function store(Request $request)
    {
        $excursion = Excursion::query()->create([
            'name_ru' => $request->input('name_ru'),
            'name_en' => $request->input('name_en'),
            'km' => $request->input('km'),
            'time' => $request->input('time'),
            'price' => $request->input('price'),
            'other_price' => $request->input('other_price'),
            'sale' => $request->input('sale'),
            'ticket' => $request->input('ticket'),
            'percent' => $request->input('percent'),
            'addition' => $request->input('addition'),
            'guide' => $request->input('guide'),
            'lunch' => $request->input('lunch'),
            'description_ru' => $request->input('description_ru'),
            'description_en' => $request->input('description_en'),
        ]);

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $fileName = time() + rand(1, 99999);
            $extension = $image->getClientOriginalExtension();
            $image->move(public_path('uploads/excursions/'), $fileName);
            imageConvert(public_path('uploads/excursions/'), $fileName, $extension);
            $excursion->image = $fileName . '.webp';
            $excursion->save();

        }

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $fileName = time() + rand(1, 99999999) + rand(1, 99999999) + rand(1, 99999999) + rand(1, 99999999);
                $extension = $photo->getClientOriginalExtension();
                $photo->move(public_path('uploads/excursions/photos/'), $fileName);
                imageConvert(public_path('uploads/excursions/photos/'), $fileName, $extension);
                $gallery = new ExcursionGallery();
                $gallery->excursion_id = $excursion->id;
                $gallery->name = $fileName . '.webp';
                $gallery->save();
            }
        }

        return redirect()->route('excursion.show', $excursion->id);
    }

    public function show(\App\Models\Excursion $excursion)
    {
        return view('admin.excursion.show', compact('excursion'));
    }

    public function edit(\App\Models\Excursion $excursion)
    {
        return view('admin.excursion.edit', compact('excursion'));
    }

    public function update(Request $request, \App\Models\Excursion $excursion)
    {
        $excursion->update([
            'name_ru' => $request->input('name_ru'),
            'name_en' => $request->input('name_en'),
            'km' => $request->input('km'),
            'time' => $request->input('time'),
            'price' => $request->input('price'),
            'other_price' => $request->input('other_price'),
            'sale' => $request->input('sale'),
            'ticket' => $request->input('ticket'),
            'percent' => $request->input('percent'),
            'addition' => $request->input('addition'),
            'guide' => $request->input('guide'),
            'lunch' => $request->input('lunch'),
            'description_ru' => $request->input('description_ru'),
            'description_en' => $request->input('description_en'),
        ]);

        if ($request->hasFile('image')) {

            try {
                File::delete(public_path('uploads/excursions/' . $excursion->image));
            } catch (\Exception $e) {
            }

            $image = $request->file('image');
            $fileName = time() + rand(1, 99999);
            $extension = $image->getClientOriginalExtension();
            $image->move(public_path('uploads/excursions/'), $fileName);
            imageConvert(public_path('uploads/excursions/'), $fileName, $extension);
            $excursion->image = $fileName . '.webp';
            $excursion->save();
        }
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $fileName = time() + rand(1, 99999999) + rand(1, 99999999) + rand(1, 99999999) + rand(1, 99999999);
                $extension = $photo->getClientOriginalExtension();
                $photo->move(public_path('uploads/excursions/photos/'), $fileName);
                imageConvert(public_path('uploads/excursions/photos/'), $fileName, $extension);
                $gallery = new ExcursionGallery();
                $gallery->excursion_id = $excursion->id;
                $gallery->name = $fileName . '.webp';
                $gallery->save();
            }
        }

        return redirect()->route('excursion.show', $excursion->id);
    }

    public function photoDelete(Request $request)
    {
        $photo = ExcursionGallery::query()->find($request->input('id'));
        try {
            File::delete('uploads/excursions/photos/' . $photo->name);
        } catch (\Exception $e) {
        }
        $photo->delete();
        return response()->json([
            'success' => true,
            'id' => $request->input('id')
        ]);
    }

    public function destroy(\App\Models\Excursion $excursion)
    {
        ExcursionOrder::query()->where('excursion_id', $excursion->id)->delete();

        if (isset($excursion->photos)) {
            foreach ($excursion->photos as $photo) {
                try {
                    File::delete(public_path('uploads/excursions/photos/' . $photo->name));
                } catch (\Exception $e) {
                }
                $photo->delete();
            }
        }

        try {
            File::delete(public_path('uploads/excursions/' . $excursion->image));
        } catch (\Exception $e) {
        }

        $excursion->delete();

        return response()->json([
            'success' => true,
            'id' => $excursion->id
        ]);
    }
}
