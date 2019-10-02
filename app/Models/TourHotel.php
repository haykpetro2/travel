<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourHotel extends Model
{

    protected $table = 'tour_hotels';
    protected $casts = [
        'prices' => 'array'
    ];

    protected $fillable = [
        'tour_id', 'hotel_id', 'prices'
    ];

    public function tour()
    {
        return $this->belongsTo('App\Models\Tour', 'tour_id', 'id');
    }

    public function hotel()
    {
        return $this->belongsTo('App\Models\Hotel', 'hotel_id', 'id');
    }

}
