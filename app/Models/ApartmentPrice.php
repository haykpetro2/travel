<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApartmentPrice extends Model
{
    protected $table = 'apartment_prices';
    protected $fillable = [
        'apartment_id', 'day', 'price'
    ];

    public function apartment()
    {
        return $this->belongsTo('App\Models\Apartment', 'apartment_id', 'id');
    }

}
