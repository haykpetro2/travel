<?php

namespace App\Http\Controllers\Admin;

use App\Models\Expert;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExpertController extends Controller
{

    public function create()
    {
        return view('admin.tours.create-expert');
    }

    public function store(Request $request)
    {

        $expert = Expert::query()->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'skype' => $request->input('skype'),
            'phone' => $request->input('phone'),
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() + rand(1, 999999);
            $extension = $image->getClientOriginalExtension();
            $image->move(public_path('uploads/experts/'), $fileName);
            imageConvert(public_path('uploads/experts/'), $fileName, $extension);
            $expert->image = $fileName . '.webp';
            $expert->save();

        }

        return redirect()->route('tour.index');

    }

    public function edit(\App\Models\Expert $expert)
    {
        return view('admin.tours.edit-expert', compact('expert'));
    }

    public function update(Request $request, \App\Models\Expert $expert)
    {
        $expert->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'skype' => $request->input('skype'),
            'phone' => $request->input('phone'),
        ]);

        if ($request->hasFile('image')) {

            try {
                unlink(public_path('uploads/experts/' . $expert->image));
            } catch (\Exception $e) {
            }

            $image = $request->file('image');
            $fileName = time() + rand(1, 999999);
            $extension = $image->getClientOriginalExtension();
            $image->move(public_path('uploads/experts/'), $fileName);
            imageConvert(public_path('uploads/experts/'), $fileName, $extension);
            $expert->image = $fileName . '.webp';
            $expert->save();
        }
        return redirect()->route('tour.index');
    }

    public function destroy(\App\Models\Expert $expert)
    {

        try {
            unlink(public_path('uploads/experts/' . $expert->image));
        } catch (\Exception $e) {
        }

        $expert->delete();
    }

}
