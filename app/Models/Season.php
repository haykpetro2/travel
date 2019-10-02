<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $table = 'seasons';
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];
    protected $fillable = [
        'hotel_id', 'name', 'start_date', 'end_date'
    ];

    protected $dateFormat = "Y-m-d";
    public $timestamps = false;

    public function settings()
    {
        return $this->hasMany('App\Models\HotelRoomPrice');
    }

    public function hotel()
    {
        return $this->belongsTo('App\Models\Hotel', 'hotel_id', 'id');
    }
}
