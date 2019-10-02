<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransportType extends Model
{
    protected $table = 'transport_types';
    protected $fillable = [
        'name_ru', 'name_en'
    ];

    public function transports()
    {
        return $this->hasMany('App\Models\Transport');
    }
}
