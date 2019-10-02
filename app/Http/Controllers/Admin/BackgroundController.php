<?php

namespace App\Http\Controllers\Admin;

use App\Models\Background;
use App\Models\YouTube;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class BackgroundController extends Controller
{


    public function store(Request $request)
    {
        if ($request->input('video')) {
            YouTube::query()->delete();
            YouTube::query()->create([
                'link' => $request->input('video')
            ]);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() + rand(1, 99999);
            $extension = $image->getClientOriginalExtension();
            $image->move(public_path('uploads/backgrounds/'), $fileName);
            imageConvert(public_path('uploads/backgrounds/'), $fileName, $extension);
            $background = new Background();
            $background->page = $request->input('page');
            $background->image = $fileName . '.webp';
            $background->save();
        }

        return back();
    }

    public function destroy(\App\Models\Background $background)
    {
        try {
            File::delete(public_path('uploads/backgrounds/' . $background->image));
        } catch (\Exception $e) {
        }
        $background->delete();
    }

}
