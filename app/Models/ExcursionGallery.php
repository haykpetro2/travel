<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExcursionGallery extends Model
{
    protected $table = 'excursion_galleries';

    protected $fillable = [
        'excursion_id', 'name'
    ];

    public function excursion()
    {
        return $this->belongsTo('App\Models\Excursion', 'excursion_id', 'id');
    }
}
