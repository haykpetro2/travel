<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Excursion extends Model
{
    protected $table = 'excursions';

    protected $fillable = [
        'name_ru', 'name_en', 'km', 'time', 'price', 'other_price', 'sale',
        'ticket', 'percent', 'addition', 'guide', 'lunch',
        'image', 'description_ru', 'description_en'
    ];

    public function photos()
    {
        return $this->hasMany('App\Models\ExcursionGallery');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\ExcursionOrders');
    }

}
