<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransportAttribute extends Model
{
    protected $table = 'transport_attributes';
    protected $fillable = [
        'name_ru', 'name_en', 'price', 'icon'
    ];

    public function transports()
    {
        return $this->hasMany('App\Models\TransportAttr');
    }

}
