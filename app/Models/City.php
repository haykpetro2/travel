<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';
    protected $fillable = [
        'name_ru', 'name_en', 'country_id', 'capital',
        'description_ru', 'description_en'
    ];

    public function country()
    {
        return $this->belongsTo('App\Models\Country', 'country_id', 'id');
    }

    public function hotels()
    {
        return $this->hasMany('App\Models\Hotel');
    }

    public function photos()
    {
        return $this->hasMany('App\Models\CityGallery');
    }
}
