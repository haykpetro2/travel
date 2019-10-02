<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExcursionOrder extends Model
{

    protected $table = 'excursion_orders';
    
    protected $fillable = [
        'excursion_id', 'first_name', 'last_name', 'email', 'phone',
        'check_in', 'check_out', 'person','lunch','guide','note',
        'total','per_person'
    ];

    public function excursion()
    {
        return $this->belongsTo('App\Models\Excursion', 'excursion_id', 'id');
    }

}
