<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use App\Models\TransportAttr;
use App\Models\TransportOrder;
use App\Models\TransportPrice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TransportType;


class TransportTypeController extends Controller
{
    public function store(Request $request)
    {

        TransportType::query()->create([
            'name_ru' => $request->input('name_ru'),
            'name_en' => $request->input('name_en'),
        ]);

        return redirect()->route('transport.index');
    }

    public function update(Request $request, \App\Models\TransportType $transportType)
    {

        $transportType->update([
            'name_ru' => $request->input('name_ru'),
            'name_en' => $request->input('name_en'),
        ]);

        return redirect()->route('transport.index');
    }

    public function destroy(\App\Models\TransportType $transportType)
    {
        if (isset($transportType->transports)) {

            foreach ($transportType->transports as $transport) {
                TransportAttr::query()->where('transport_id', $transport->id)->delete();
                TransportPrice::query()->where('transport_id', $transport->id)->delete();
                TransportOrder::query()->where('transport_id', $transport->id)->delete();
                Comment::query()->where('transport_id', $transport->id)->delete();

                if (isset($transport->photos)) {
                    foreach ($transport->photos as $photo) {
                        try {
                            unlink(public_path('uploads/transports/photos/' . $photo->name));

                        } catch (\Exception $e) {
                        }
                        $photo->delete();
                    }
                }
                try {
                    unlink(public_path('uploads/transports/' . $transport->image));
                } catch (\Exception $e) {
                }

                $transport->delete();
            }
        }
        $transportType->delete();
    }
}
