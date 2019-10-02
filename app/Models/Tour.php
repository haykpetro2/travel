<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $table = 'tours';
    protected $casts = [
        'checks' => 'array'
    ];

    protected $fillable = [
        'home', 'type', 'country_id', 'name_ru', 'name_en',
        'expert_id', 'tour_type_id', 'price', 'sale', 'checks',
        'short_description_ru', 'short_description_en',
        'description_ru', 'description_en', 'image'
    ];

    public function tour_type()
    {
        return $this->belongsTo('App\Models\TourType', 'tour_type_id', 'id');
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Country', 'country_id', 'id');
    }

    public function expert()
    {
        return $this->belongsTo('App\Models\Expert', 'expert_id', 'id');
    }

    public function tour_hotels()
    {
        return $this->hasMany('App\Models\TourHotel');
    }

    public function destinations()
    {
        return $this->hasMany('App\Models\TourDestination');
    }

    public function promoCode()
    {
        return $this->hasOne('App\Models\TourPromoCode');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\TourOrder');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment')->where('status', 1);
    }


}
