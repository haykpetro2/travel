<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelOrder extends Model
{
    protected $table = 'hotel_orders';

    protected $fillable = [
        'hotel_id', 'room_id', 'first_name', 'last_name', 'email', 'phone',
        'check_in', 'check_out', 'person', 'note', 'total'
    ];


    public function hotel()
    {
        return $this->belongsTo('App\Models\Hotel', 'hotel_id', 'id');
    }

    public function room()
    {
        return $this->belongsTo('App\Models\HotelRoom', 'room_id', 'id');
    }

}
