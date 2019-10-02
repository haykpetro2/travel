<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{

    public function index()
    {
        $abouts = About::query()->get();
        return view('admin.about.index', compact('abouts'));
    }


    public function create()
    {
        return view('admin.about.create');
    }


    public function store(Request $request)
    {

        $about = About::query()->create([
            'description_ru' => $request->input('description_ru'),
            'description_en' => $request->input('description_en'),
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() + rand(1, 99999);
            $extension = $image->getClientOriginalExtension();
            $image->move(public_path('uploads/about/'), $fileName);
            imageConvert(public_path('uploads/about/'), $fileName, $extension);
            $about->image = $fileName . '.webp';
            $about->save();
        }

        return redirect()->route('about.index');

    }


    public function show(\App\Models\About $about)
    {
        return view('admin.about.show', compact('about'));
    }


    public function edit(\App\Models\About $about)
    {
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request, \App\Models\About $about)
    {

        $about->update([
            'description_ru' => $request->input('description_ru'),
            'description_en' => $request->input('description_en'),
        ]);

        if ($request->hasFile('image')) {

            try {
                File::delete(public_path('uploads/about/' . $about->image));
            } catch (\Exception $e) {
            }

            $image = $request->file('image');
            $fileName = time() + rand(1, 999999);
            $extension = $image->getClientOriginalExtension();
            $image->move(public_path('uploads/about/'), $fileName);
            imageConvert(public_path('uploads/about/'), $fileName, $extension);
            $about->image = $fileName . '.webp';
            $about->save();
        }

        return redirect()->route('about.index');

    }

    public function destroy(\App\Models\About $about)
    {
        try {
            File::delete(public_path('uploads/about/' . $about->image));
        } catch (\Exception $e) {
        }
        $about->delete();
    }

}
