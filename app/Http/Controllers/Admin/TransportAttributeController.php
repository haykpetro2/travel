<?php

namespace App\Http\Controllers\Admin;

use App\Models\TransportAttr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TransportAttribute;

class TransportAttributeController extends Controller
{


    public function store(Request $request)
    {
        TransportAttribute::query()->create([
            'name_ru' => $request->input('name_ru'),
            'name_en' => $request->input('name_en'),
            'price' => $request->input('price'),
            'icon' => $request->input('icon')
        ]);
        return redirect()->route('transport.index');
    }

    public function update(Request $request, \App\Models\TransportAttribute $transportAttribute)
    {

        $transportAttribute->update([
            'name_ru' => $request->input('name_ru'),
            'name_en' => $request->input('name_en'),
            'price' => $request->input('price'),
            'icon' => $request->input('icon')
        ]);

    }

    public function destroy(\App\Models\TransportAttribute $transportAttribute)
    {
        TransportAttr::query()->where('attribute_id', $transportAttribute->id)->delete();
        $transportAttribute->delete();
    }

}
