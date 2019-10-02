<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $table = 'apartments';

    protected $fillable = [
        'home', 'name_ru', 'name_en', 'type', 'price', 'sale',
        'address', 'image', 'room', 'area',
        'description_ru', 'description_en'
    ];


    public function photos()
    {
        return $this->hasMany('App\Models\ApartmentGallery');
    }

    public function prices()
    {
        return $this->hasMany('App\Models\ApartmentPrice');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\ApartmentOrder');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment')->where('status', 1);
    }

}
