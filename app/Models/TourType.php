<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourType extends Model
{
    protected $table = 'tour_types';
    protected $fillable = [
        'name_ru', 'name_en'
    ];

    public function tours()
    {
        return $this->hasMany('App\Models\Tour');
    }
}
