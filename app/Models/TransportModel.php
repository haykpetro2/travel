<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransportModel extends Model
{
    protected $table = 'transport_models';
    protected $fillable = [
        'name_ru', 'name_en'
    ];

    public function transports()
    {
        return $this->hasMany('App\Models\Transport');
    }
}
