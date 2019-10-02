<?php

namespace App\Http\Controllers\Admin;

use App\Models\Condition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConditionController extends Controller
{

    public function create()
    {
        return view('admin.other.create-condition');
    }

    public function store(Request $request)
    {
        Condition::query()->create([
            'description_ru' => $request->input('description_ru'),
            'description_en' => $request->input('description_en'),
        ]);

        return redirect()->route('currency.index');
    }


    public function show(\App\Models\Condition $condition)
    {
        return view('admin.other.show-condition', compact('condition'));
    }


    public function edit(\App\Models\Condition $condition)
    {
        return view('admin.other.edit-condition', compact('condition'));
    }

    public function update(Request $request, \App\Models\Condition $condition)
    {
        $condition->update([
            'description_ru' => $request->input('description_ru'),
            'description_en' => $request->input('description_en'),
        ]);

        return redirect()->route('currency.index');
    }


    public function destroy(\App\Models\Condition $condition)
    {
        $condition->delete();
    }
}
