<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransportGallery extends Model
{
    protected $table = 'transport_galleries';
    protected $fillable = [
        'transport_id', 'name'
    ];

    public function transport()
    {
        return $this->belongsTo('App\Models\Transport', 'transport_id', 'id');
    }
}
