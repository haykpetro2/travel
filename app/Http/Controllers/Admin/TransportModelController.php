<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use App\Models\TransportAttr;
use App\Models\TransportModel;
use App\Models\TransportOrder;
use App\Models\TransportPrice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class TransportModelController extends Controller
{
    public function store(Request $request)
    {
        TransportModel::query()->create([
            'name_ru' => $request->input('name_ru'),
            'name_en' => $request->input('name_en'),
        ]);
        return redirect()->route('transport.index');
    }

    public function update(Request $request, \App\Models\TransportModel $transportModel)
    {
        $transportModel->update([
            'name_ru' => $request->input('name_ru'),
            'name_en' => $request->input('name_en'),
        ]);
        return redirect()->route('transport.index');
    }

    public function destroy(\App\Models\TransportModel $transportModel)
    {
        if (isset($transportModel->transports)) {

            foreach ($transportModel->transports as $transport) {

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
                    File::delete(public_path('uploads/transports/' . $transport->image));
                } catch (\Exception $e) {
                }
                $transport->delete();
            }
        }
        $transportModel->delete();
    }

}
