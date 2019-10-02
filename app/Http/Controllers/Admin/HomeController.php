<?php

namespace App\Http\Controllers\Admin;


use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Models\TourOrder;
use App\Models\HotelOrder;
use App\Models\TransportOrder;
use App\Models\ApartmentOrder;
use App\Models\ExcursionOrder;


class HomeController extends Controller
{

    public function index()
    {
        return view('admin.dashboard');
    }

    public function orders(Request $request)
    {
        $model = $request->input('model');

        if ($model == 'tour') {
            $orders = TourOrder::query()->orderByDesc('id')->get();
            return View::make('admin.tours.order', compact('orders'));
        }

        if ($model == 'hotel') {
            $orders = HotelOrder::query()->orderByDesc('id')->get();
            return View::make('admin.hotels.order', compact('orders'));
        }

        if ($model == 'transport') {
            $orders = TransportOrder::query()->orderByDesc('id')->get();
            return View::make('admin.transport.order', compact('orders'));
        }
        if ($model == 'apartment') {
            $orders = ApartmentOrder::query()->orderByDesc('id')->get();
            return View::make('admin.apartment.order', compact('orders'));
        }
        if ($model == 'excursion') {
            $orders = ExcursionOrder::query()->orderByDesc('id')->get();
            return View::make('admin.excursion.order', compact('orders'));
        }

    }

    public function orderDelete(Request $request)
    {
        $model = $request->input('name');

        if ($model == 'tour') {
            TourOrder::query()->find($request->input('id'))->delete();
            return response()->json([
                'success' => true,
                'id' => $request->input('id')
            ]);
        }
        if ($model == 'hotel') {
            HotelOrder::query()->find($request->input('id'))->delete();
            return response()->json([
                'success' => true,
                'id' => $request->input('id')
            ]);
        }
        if ($model == 'transport') {
            TransportOrder::query()->find($request->input('id'))->delete();
            return response()->json([
                'success' => true,
                'id' => $request->input('id')
            ]);
        }
        if ($model == 'apartment') {
            ApartmentOrder::query()->find($request->input('id'))->delete();
            return response()->json([
                'success' => true,
                'id' => $request->input('id')
            ]);
        }
        if ($model == 'excursion') {
            ExcursionOrder::query()->find($request->input('id'))->delete();
            return response()->json([
                'success' => true,
                'id' => $request->input('id')
            ]);
        }

    }

    public function comment(Request $request)
    {
        Comment::query()->find($request->id)->update([
            'status' => $request->input('val')
        ]);
    }

}
