<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelRoomGallery extends Model
{
    protected $table = 'hotel_room_galleries';
    protected $fillable = [
        'hotel_room_id', 'name'
    ];

    public function rooms()
    {
        return $this->belongsTo('App\Models\HotelRoom', 'hotel_room_id', 'id');
    }

}
