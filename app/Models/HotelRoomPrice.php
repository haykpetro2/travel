<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelRoomPrice extends Model
{
    protected $table = 'hotel_room_prices';
    protected $fillable = [
        'hotel_room_id', 'season_id', 'price'
    ];

    public function room()
    {
        return $this->belongsTo('App\Models\HotelRoom', 'hotel_room_id', 'id');
    }

    public function season()
    {
        return $this->belongsTo('App\Models\Season', 'season_id', 'id');
    }

}
