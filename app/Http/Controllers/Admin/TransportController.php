<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Transport;
use App\Models\TransportAttr;
use App\Models\TransportAttribute;
use App\Models\TransportGallery;
use App\Models\TransportModel;
use App\Models\TransportOrder;
use App\Models\TransportPrice;
use App\Models\TransportType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TransportController extends Controller
{

    public function index()
    {
        $transports = Transport::query()->orderByDesc('id')->paginate(10);
        $types = TransportType::query()->orderByDesc('id')->get();
        $models = TransportModel::query()->orderByDesc('id')->get();
        $attributes = TransportAttribute::query()->orderByDesc('id')->get();
        return view('admin.transport.index', compact('transports', 'types', 'models', 'attributes'));
    }

    public function create()
    {
        $types = TransportType::query()->get();
        $models = TransportModel::query()->get();
        $attributes = TransportAttribute::query()->get();
        return view('admin.transport.create-transport', compact('types', 'models', 'attributes'));
    }

    public function store(Request $request)
    {
        $transport = Transport::query()->create([
            'name_ru' => $request->input('name_ru'),
            'name_en' => $request->input('name_en'),
            'transport_type_id' => $request->input('type_id'),
            'transport_model_id' => $request->input('model_id'),
            'person' => $request->input('person'),
            'motor' => $request->input('motor'),
            'transmission' => $request->input('transmission'),
            'door' => $request->input('door'),
            'price' => $request->input('price'),
            'sale' => $request->input('sale'),
            'driver' => $request->input('driver'),
            'short_description_ru' => $request->input('short_description_ru'),
            'short_description_en' => $request->input('short_description_en'),
            'description_ru' => $request->input('description_ru'),
            'description_en' => $request->input('description_en'),

        ]);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() + rand(1, 999999);
            $extension = $image->getClientOriginalExtension();
            $image->move(public_path('uploads/transports/'), $fileName);
            imageConvert(public_path('uploads/transports/'), $fileName, $extension);
            $transport->image = $fileName . '.webp';
            $transport->save();
        }

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $fileName = time() + rand(1, 999999) + rand(1, 999999) + rand(1, 999999) + rand(1, 999999);
                $extension = $photo->getClientOriginalExtension();
                $photo->move(public_path('uploads/transports/photos/'), $fileName);
                imageConvert(public_path('uploads/transports/photos/'), $fileName, $extension);
                $gallery = new TransportGallery();
                $gallery->transport_id = $transport->id;
                $gallery->name = $fileName . '.webp';
                $gallery->save();

            }
        }
        if ($request->has('attributes')) {
            foreach ($request->input('attributes') as $attr) {
                $transportAttr = new TransportAttr();
                $transportAttr->transport_id = $transport->id;
                $transportAttr->attribute_id = $attr;
                $transportAttr->save();
            }
        }

        return redirect()->route('transport.show', $transport->id);
    }

    public function show(\App\Models\Transport $transport)
    {
        $comments = Comment::query()->where('transport_id', $transport->id)->orderByDesc('id')->get();
        return view('admin.transport.show-transport', compact('transport', 'comments'));
    }

    public function edit(\App\Models\Transport $transport)
    {
        $types = TransportType::query()->get();
        $models = TransportModel::query()->get();
        $attributes = TransportAttribute::query()->get();
        return view('admin.transport.edit-transport', compact('transport', 'types', 'attributes', 'models'));
    }

    public function update(Request $request, \App\Models\Transport $transport)
    {
        $transport->update([
            'name_ru' => $request->input('name_ru'),
            'name_en' => $request->input('name_en'),
            'transport_type_id' => $request->input('type_id'),
            'transport_model_id' => $request->input('model_id'),
            'person' => $request->input('person'),
            'motor' => $request->input('motor'),
            'transmission' => $request->input('transmission'),
            'door' => $request->input('door'),
            'price' => $request->input('price'),
            'sale' => $request->input('sale'),
            'driver' => $request->input('driver'),
            'short_description_ru' => $request->input('short_description_ru'),
            'short_description_en' => $request->input('short_description_en'),
            'description_ru' => $request->input('description_ru'),
            'description_en' => $request->input('description_en'),

        ]);

        if ($request->hasFile('image')) {
            try {
                File::delete(public_path('uploads/transports/' . $transport->image));
            } catch (\Exception $e) {
            }

            $image = $request->file('image');
            $fileName = time() + rand(1, 99999);
            $extension = $image->getClientOriginalExtension();
            $image->move(public_path('uploads/transports/'), $fileName);
            imageConvert(public_path('uploads/transports/'), $fileName, $extension);
            $transport->image = $fileName . '.webp';
            $transport->save();

        }

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $fileName = time() + rand(1, 999999) + rand(1, 999999) + rand(1, 999999) + rand(1, 999999);
                $extension = $photo->getClientOriginalExtension();
                $photo->move(public_path('uploads/transports/photos/'), $fileName);
                imageConvert(public_path('uploads/transports/photos/'), $fileName, $extension);
                $gallery = new TransportGallery();
                $gallery->transport_id = $transport->id;
                $gallery->name = $fileName . '.webp';
                $gallery->save();
            }
        }

        if ($request->has('attributes')) {

            TransportAttr::query()->where('transport_id', $transport->id)->delete();

            foreach ($request->input('attributes') as $attr) {
                $transportAttr = new TransportAttr();
                $transportAttr->transport_id = $transport->id;
                $transportAttr->attribute_id = $attr;
                $transportAttr->save();
            }

        } else {
            TransportAttr::query()->where('transport_id', $transport->id)->delete();
        }

        return redirect()->route('transport.show', $transport->id);

    }

    public function photoDelete(Request $request)
    {
        $photo = TransportGallery::query()->find($request->input('id'));
        try {
            File::delete(public_path('uploads/transports/photos/' . $photo->name));
        } catch (\Exception $e) {
        }
        $photo->delete();
        return response()->json([
            'success' => true,
            'id' => $request->input('id')
        ]);
    }

    public function destroy(\App\Models\Transport $transport)
    {
        TransportAttr::query()->where('transport_id', $transport->id)->delete();
        TransportPrice::query()->where('transport_id', $transport->id)->delete();
        TransportOrder::query()->where('transport_id', $transport->id)->delete();
        Comment::query()->where('transport_id', $transport->id)->delete();

        if (isset($transport->photos)) {
            foreach ($transport->photos as $photo) {
                try {
                    File::delete(public_path('uploads/transports/photos/' . $photo->name));

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
