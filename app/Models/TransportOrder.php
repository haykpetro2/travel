<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransportOrder extends Model
{
    protected $table = 'transport_orders';

    protected $fillable = [
        'transport_id', 'first_name', 'last_name', 'email', 'phone',
        'check_in', 'check_out', 'note', 'total'
    ];

    public function transport()
    {
        return $this->belongsTo('App\Models\Transport', 'transport_id', 'id');
    }

}
