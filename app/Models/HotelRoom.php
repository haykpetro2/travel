<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelRoom extends Model
{
    protected $table = 'hotel_rooms';
    protected $fillable = [
        'hotel_id', 'name', 'price', 'sale', 'count'
    ];


    public function hotel()
    {
        return $this->belongsTo('App\Models\Hotel', 'hotel_id', 'id');
    }

    public function photos()
    {
        return $this->hasMany('App\Models\HotelRoomGallery');
    }

    public function settings()
    {
        return $this->hasMany('App\Models\HotelRoomPrice');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\HotelOrder');
    }

}
