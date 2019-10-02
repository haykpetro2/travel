<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransportPrice extends Model
{

    protected $table = 'transport_prices';
    protected $fillable = [
        'transport_id', 'day', 'price'
    ];

    public function transport()
    {
        return $this->belongsTo('App\Models\Transport', 'transport_id', 'id');
    }

}
