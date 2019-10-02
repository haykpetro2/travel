<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourOrder extends Model
{
    protected $table = 'tour_orders';

    protected $fillable = [
        'tour_id', 'hotel_id', 'hotel_name', 'first_name', 'last_name', 'email', 'phone',
        'adult', 'child_6', 'child_12', 'note', 'promo_code', 'total'
    ];

    public function tour()
    {
        return $this->belongsTo('App\Models\Tour', 'tour_id', 'id');
    }

}
