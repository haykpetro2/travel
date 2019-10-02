<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApartmentOrder extends Model
{
    protected $table = 'apartment_orders';

    protected $fillable = [
        'apartment_id', 'first_name', 'last_name', 'phone',
        'email', 'check_in', 'check_out', 'note', 'total'
    ];

    public function apartment()
    {
        return $this->belongsTo('App\Models\Apartment', 'apartment_id', 'id');
    }

}
