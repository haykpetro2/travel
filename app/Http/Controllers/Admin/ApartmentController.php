<?php

namespace App\Http\Controllers\Admin;

use App\Models\ApartmentOrder;
use App\Models\ApartmentPrice;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\ApartmentGallery;
use Illuminate\Support\Facades\File;


class ApartmentController extends Controller
{


    public function index()
    {
        $apartments = Apartment::query()->orderByDesc('id')->paginate(10);
        return view('admin.apartment.index', compact('apartments'));
    }

    public function create()
    {
        return view('admin.apartment.create-apartment');
    }

    public function store(Request $request)
    {
        $apartment = Apartment::query()->create([
            'home' => $request->input('home'),
            'name_ru' => $request->input('name_ru'),
            'name_en' => $request->input('name_en'),
            'type' => $request->input('type'),
            'price' => $request->input('price'),
            'sale' => $request->input('sale'),
            'room' => $request->input('room'),
            'area' => $request->input('area'),
            'address' => $request->input('address'),
            'description_ru' => $request->input('description_ru'),
            'description_en' => $request->input('description_en'),
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() + rand(1, 999999);
            $extension = $image->getClientOriginalExtension();
            $image->move(public_path('uploads/apartments/'), $fileName);
            imageConvert(public_path('uploads/apartments/'), $fileName, $extension);
            $apartment->image = $fileName . '.webp';
            $apartment->save();
        }

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $fileName = time() + rand(1, 999999) + rand(1, 999999) + rand(1, 999999) + rand(1, 999999) + rand(1, 999999) + rand(1, 999999);
                $extension = $photo->getClientOriginalExtension();
                $photo->move(public_path('uploads/apartments/photos/'), $fileName);
                imageConvert(public_path('uploads/apartments/photos/'), $fileName, $extension);
                $gallery = new ApartmentGallery();
                $gallery->apartment_id = $apartment->id;
                $gallery->name = $fileName . '.webp';
                $gallery->save();
            }
        }

        return redirect()->route('apartment.show', $apartment->id);
    }

    public function show(\App\Models\Apartment $apartment)
    {
        $comments = Comment::query()->where('apartment_id', $apartment->id)->orderByDesc('id')->get();
        return view('admin.apartment.show-apartment', compact('apartment', 'comments'));
    }

    public function edit(\App\Models\Apartment $apartment)
    {
        return view('admin.apartment.edit-apartment', compact('apartment'));
    }

    public function update(Request $request, \App\Models\Apartment $apartment)
    {

        $apartment->update([
            'home' => $request->input('home'),
            'name_ru' => $request->input('name_ru'),
            'name_en' => $request->input('name_en'),
            'type' => $request->input('type'),
            'price' => $request->input('price'),
            'sale' => $request->input('sale'),
            'room' => $request->input('room'),
            'area' => $request->input('area'),
            'address' => $request->input('address'),
            'description_ru' => $request->input('description_ru'),
            'description_en' => $request->input('description_en'),
        ]);

        if ($request->hasFile('image')) {
            try {
                File::delete(public_path('uploads/apartments/' . $apartment->image));
            } catch (\Exception $e) {
            }

            $image = $request->file('image');
            $fileName = time() + rand(1, 999999);
            $extension = $image->getClientOriginalExtension();
            $image->move(public_path('uploads/apartments/'), $fileName);
            imageConvert(public_path('uploads/apartments/'), $fileName, $extension);
            $apartment->image = $fileName . '.webp';
            $apartment->save();

        }

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $fileName = time() + rand(1, 999999) + rand(1, 999999) + rand(1, 999999) + rand(1, 999999) + rand(1, 999999) + rand(1, 999999);
                $extension = $photo->getClientOriginalExtension();
                $photo->move(public_path('uploads/apartments/photos/'), $fileName);
                imageConvert(public_path('uploads/apartments/photos/'), $fileName, $extension);
                $gallery = new ApartmentGallery();
                $gallery->apartment_id = $apartment->id;
                $gallery->name = $fileName . '.webp';
                $gallery->save();
            }

        }

        return redirect()->route('apartment.show', $apartment->id);
    }

    public function photoDelete(Request $request)
    {

        $photo = ApartmentGallery::query()->find($request->input('id'));

        try {
            File::delete('uploads/apartments/photos/' . $photo->name);
        } catch (\Exception $e) {
        }

        $photo->delete();

        return response()->json([
            'success' => true,
            'id' => $request->input('id')
        ]);

    }

    public function destroy(\App\Models\Apartment $apartment)
    {
        ApartmentPrice::query()->where('apartment_id', $apartment->id)->delete();
        ApartmentOrder::query()->where('apartment_id', $apartment->id)->delete();
        Comment::query()->where('apartment_id', $apartment->id)->delete();

        if (isset($apartment->photos)) {
            foreach ($apartment->photos as $photo) {
                try {
                    File::delete(public_path('uploads/apartments/photos/' . $photo->name));
                    $photo->delete();
                } catch (\Exception $e) {
                }
            }
        }

        try {
            File::delete(public_path('uploads/apartments/' . $apartment->image));
        } catch (\Exception $e) {
        }
        $apartment->delete();
    }

}
