<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {


        Route::get('', 'HomeController@index')->name('home');
        Route::get('about/{id}', 'HomeController@about')->name('about');

        /* --------- Tour ------------ */
        Route::get('tour/{country}', 'TourController@index')->name('tours');
        Route::get('tour-detail/{id}', 'TourController@detail')->name('tour.detail');
        Route::get('tour-booking/{id}', 'TourController@form')->name('tour.form');
        Route::post('tour-total', 'TourController@total')->name('tour.total');
        Route::post('tour-book', 'TourController@booking')->name('tour.booking');


        /* --------- Hotel ------------ */
        Route::get('hotel/{country}/{city?}', 'HotelController@index')->name('hotels');
        Route::get('hotel-detail/{id}', 'HotelController@detail')->name('hotel.detail');
        Route::get('hotel-booking/{id}', 'HotelController@form')->name('hotel.form');
        Route::post('hotel-total', 'HotelController@total')->name('hotel.total');
        Route::post('hotel-book', 'HotelController@booking')->name('hotel.booking');

        /* --------- Transport ------------ */
        Route::get('transport', 'TransportController@index')->name('transports');
        Route::get('transport-detail/{id}', 'TransportController@detail')->name('transport.detail');
        Route::post('transport-total', 'TransportController@total')->name('transport.total');
        Route::post('transport-book', 'TransportController@booking')->name('transport.booking');


        /* --------- Apartment ------------ */
        Route::get('apartment', 'ApartmentController@index')->name('apartments');
        Route::get('apartment-detail/{id}', 'ApartmentController@detail')->name('apartment.detail');
        Route::post('apartment-total', 'ApartmentController@total')->name('apartment.total');
        Route::post('apartment-book', 'ApartmentController@booking')->name('apartment.booking');

        /* --------- Excursion ------------ */
        Route::match(['get', 'post'], 'excursion', 'ExcursionController@index')->name('excursions');
        Route::get('excursion-detail/{id}', 'ExcursionController@detail')->name('excursion.detail');
        Route::post('excursion-total', 'ExcursionController@total')->name('excursion.total');
        Route::post('excursion-book', 'ExcursionController@booking')->name('excursion.booking');

        /* --------- Blog ------------ */
        Route::get('post', 'PostController@index')->name('posts');
        Route::get('post-detail/{id}', 'PostController@detail')->name('post.detail');
        Route::post('post-filter', 'PostController@filter')->name('post.filter');
        Route::post('tag-filter', 'PostController@tag')->name('tag.filter');


        /* --------- Other ------------ */
        Route::get('gallery', 'HomeController@gallery')->name('gallery');
        Route::get('faq', 'HomeController@faq')->name('faq');
        Route::get('contact', 'HomeController@contact')->name('contact');
        Route::get('condition', 'HomeController@condition')->name('condition');
        Route::post('change', 'HomeController@change')->name('change');
        Route::post('send', 'HomeController@send')->name('send');
        Route::post('comment', 'HomeController@comment')->name('comment');
        Route::post('send-subscribe', 'HomeController@subscribe')->name('send.subscribe');

    });

Route::get('/travel-login', 'MyAuth\LoginController@getLogin')->name('get.login');
Route::post('admin-login', 'MyAuth\LoginController@login')->name('login');

Route::group(
    [
        'prefix' => 'super-admin',
        'namespace' => 'Admin',
        'middleware' => 'admin'
    ],
    function () {

        //  ------------  Dashboard --------- //
        Route::get('/', 'HomeController@index')->name('admin.index');
        Route::post('orders', 'HomeController@orders')->name('orders');
        Route::post('order-delete', 'HomeController@orderDelete')->name('order.delete');

        //  ------------  Country --------- //
        Route::resource('country', 'CountryController');
        Route::resource('city', 'CityController');
        Route::post('photo-city', 'CityController@photoDelete')->name('photo.city');

        //  ------------  Tour --------- //
        Route::resource('tour', 'TourController');
        Route::resource('expert', 'ExpertController');
        Route::resource('tour-type', 'TourTypeController');
        Route::resource('tour-hotel', 'TourHotelController');
        Route::resource('tour-destination', 'TourDestinationController');
        Route::post('table', 'TourHotelController@table')->name('table');
        Route::post('promo-code', 'TourController@promoCode')->name('promo.code');


        //  ------------  Hotel --------- //
        Route::resource('hotel', 'HotelController');
        Route::post('country-change', 'HotelController@change')->name('country.change');
        Route::resource('hotel-room', 'HotelRoomController');
        Route::post('photo-room', 'HotelRoomController@photoDelete')->name('photo.room');
        Route::resource('season', 'SeasonController');

        //  ------------  Excursion --------- //
        Route::resource('excursion', 'ExcursionController');
        Route::post('photo-excursion', 'ExcursionController@photoDelete')->name('photo.excursion');


        //  ------------  Transport --------- //
        Route::resource('transport', 'TransportController');
        Route::resource('transport-type', 'TransportTypeController');
        Route::resource('transport-model', 'TransportModelController');
        Route::resource('transport-attribute', 'TransportAttributeController');
        Route::resource('transport-price', 'TransportPriceController');
        Route::post('photo-transport', 'TransportController@photoDelete')->name('photo.transport');


        //  ------------  Apartment --------- //
        Route::resource('apartment', 'ApartmentController');
        Route::resource('apartment-price', 'ApartmentPriceController');
        Route::post('photo-apartment', 'ApartmentController@photoDelete')->name('photo.apartment');

        //  ------------  Blog --------- //
        Route::resource('post', 'PostController');
        Route::resource('category', 'CategoryController');
        Route::resource('tag', 'TagController');
        Route::post('photo-post', 'PostController@photoDelete')->name('photo.post');


        //  ------------  F.A.Q --------- //
        Route::resource('faq', 'FaqController');

        //  ------------  Gallery --------- //
        Route::resource('gallery', 'GalleryController');

        //  ------------  About --------- //
        Route::resource('about', 'AboutController');

        //  ------------  Other --------- //
        Route::resource('currency', 'CurrencyController');
        Route::resource('condition', 'ConditionController');
        Route::resource('background', 'BackgroundController');
        Route::post('comment-status', 'HomeController@comment')->name('comment.status');

    });


Auth::routes();


//Route::match(['get', 'post'], 'login', function () {
//    abort(404);
//});
//
//Route::match(['get', 'post'], 'register', function () {
//    abort(404);
//});






