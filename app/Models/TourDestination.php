<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourDestination extends Model
{
    protected $table = 'tour_destinations';
    protected $fillable = [
        'tour_id', 'title_ru', 'title_en', 'day',
        'description_ru', 'description_en', 'image'
    ];

    public function tour()
    {
        return $this->belongsTo('App\Models\Tour', 'tour_id', 'id');
    }
}
