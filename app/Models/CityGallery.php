<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CityGallery extends Model
{
    protected $table = 'city_galleries';
    protected $fillable = [
        'city_id', 'name'
    ];

    public function city()
    {
        return $this->belongsTo('App\Models\City', 'city_id', 'id');
    }
}
