<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourPromoCode extends Model
{
    protected $table = 'tour_promo_codes';
    protected $fillable = [
        'tour_id', 'code', 'percent'
    ];

    public function tour()
    {
        return $this->belongsTo('App\Models\Tour', 'tour_id', 'id');
    }
}
