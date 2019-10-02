<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    protected $table = 'countries';

    protected $fillable = [
        'name_ru', 'name_en', 'description_ru', 'description_en', 'image'
    ];


    public function cities()
    {
        return $this->hasMany('App\Models\City');
    }

    public function hotels()
    {
        return $this->hasMany('App\Models\Hotel');
    }

    public function tours()
    {
        return $this->hasMany('App\Models\Tour');
    }

}
