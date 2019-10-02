<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Condition;
use App\Models\Country;
use App\Models\Subscriber;
use App\Models\YouTube;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;
use App\Models\About;
use App\Models\Apartment;
use App\Models\Background;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\Hotel;
use App\Models\Tour;
use App\Mail\ContacUs;
use Illuminate\Support\Facades\Validator;


class HomeController extends Controller
{

    public function __construct()
    {
        parent::__construct();

        if (!Cookie::get('currency'))
            Cookie::queue('currency', 'amd', 99999);

    }

    public function index()
    {
        $you_tube = YouTube::query()->first();
        $tours = Tour::query()
            ->where('home', 1)
            ->inRandomOrder()
            ->limit(6)
            ->get();
        $hotels = Hotel::query()
            ->where('home', 1)
            ->inRandomOrder()
            ->limit(6)
            ->get();
        $apartments = Apartment::query()
            ->where('home', 1)
            ->inRandomOrder()
            ->limit(6)
            ->get();
        $about = About::query()->first();
        return view('index', compact('tours', 'hotels', 'apartments', 'about', 'you_tube'));
    }

    public function about($id)
    {
        $country = Country::with('cities')->find($id);
        return view('country', compact('country'));
    }

    public function gallery()
    {
        $photos = Gallery::query()->inRandomOrder()->get();
        $background = Background::query()->where('page', 'gallery')->first();
        return view('gallery', compact('photos', 'background'));
    }

    public function faq()
    {
        $faqs = Faq::query()->orderByDesc('id')->get();
        $background = Background::query()->where('page', 'faq')->first();
        return view('faq', compact('faqs', 'background'));
    }

    public function contact()
    {
        $background = Background::query()->where('page', 'contact')->first();
        return view('contact', compact('background'));
    }

    public function send(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|min:10|max:255'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => 'Validator Error'
            ]);
        }

        Mail::to(config('mail.username'))->send(new ContacUs($request->all()));

        return response()->json([
            'success' => true
        ]);

    }

    public function condition()
    {
        $condition = Condition::query()->firstOrFail();
        return view('policies', compact('condition'));
    }

    public function change(Request $request)
    {
        return response('1')->withCookie(cookie('currency', $request->name, 999999));
    }

    public function comment(Request $request)
    {
        $comment = Comment::query()->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'comment' => $request->input('comment')
        ]);
        if ($request->has('tour_id')) {
            $comment->tour_id = $request->input('tour_id');
            $comment->save();
        }
        if ($request->has('hotel_id')) {
            $comment->hotel_id = $request->input('hotel_id');
            $comment->save();
        }
        if ($request->has('transport_id')) {
            $comment->transport_id = $request->input('transport_id');
            $comment->save();
        }
        if ($request->has('apartment_id')) {
            $comment->apartment_id = $request->input('apartment_id');
            $comment->save();
        }
        if ($request->has('post_id')) {
            $comment->post_id = $request->input('post_id');
            $comment->save();
        }

        return back();
    }

    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|min:6|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => 'Validator Error'
            ]);
        }

        Subscriber::query()->create([
            'email' => $request->input('email')
        ]);

        return response()->json([
            'success' => true,
        ]);

    }

}
