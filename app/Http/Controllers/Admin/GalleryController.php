<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{

    public function index()
    {
        $galleries = Gallery::query()->orderByDesc('id')->paginate(10);
        return view('admin.gallery.index', compact('galleries'));
    }

    public function store(Request $request)
    {
        foreach ($request->file('photos') as $photo) {

            $fileName = time() + rand(1, 999999) + rand(1, 999999) + rand(1, 999999) + rand(1, 999999);
            $extension = $photo->getClientOriginalExtension();
            $photo->move(public_path('uploads/gallery/'), $fileName);
            imageConvert(public_path('uploads/gallery/'), $fileName, $extension);
            $gallery = new Gallery();
            $gallery->name = $fileName . '.webp';
            $gallery->save();
        }
        return back();
    }

    public function update(Request $request, \App\Models\Gallery $gallery)
    {
        $gallery->title_en = $request->input('title_en');
        $gallery->title_ru = $request->input('title_ru');
        $gallery->save();
    }

    public function destroy(\App\Models\Gallery $gallery)
    {
        try {
            File::delete(public_path('uploads/gallery/' . $gallery->name));
        } catch (\Exception $e) {
        }
        $gallery->delete();
    }

}
