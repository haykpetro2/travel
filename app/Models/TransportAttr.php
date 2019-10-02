<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransportAttr extends Model
{
    protected $table = 'transport_attrs';
    protected $fillable = [
        'transport_id', 'attribute_id'
    ];

    public function transport()
    {
        return $this->belongsTo('App\Models\Transport', 'transport_id', 'id');
    }

    public function attribute()
    {
        return $this->belongsTo('App\Models\TransportAttribute', 'attribute_id', 'id');
    }
}
