<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = 'hotels';
    protected $fillable = [
        'home', 'country_id', 'city_id', 'name_ru', 'name_en',
        'type', 'star', 'address', 'phone', 'email', 'image',
        'short_description_ru', 'short_description_en',
        'description_ru', 'description_en'
    ];

    public function country()
    {
        return $this->belongsTo('App\Models\Country', 'country_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City', 'city_id', 'id');
    }

    public function rooms()
    {
        return $this->hasMany('App\Models\HotelRoom');
    }

    public function seasons()
    {
        return $this->hasMany('App\Models\Season');
    }

    public function tour_hotel()
    {
        return $this->hasMany('App\Models\TourHotel');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\HotelOrder');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

}
