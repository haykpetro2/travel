<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApartmentGallery extends Model
{

    protected $table = 'apartment_galleries';

    protected $fillable = [
        'apartment_id', 'name'
    ];

    public function apartment()
    {
        return $this->belongsTo('App\Models\Apartment', 'apartment_id', 'id');
    }

}
