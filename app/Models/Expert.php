<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    protected $table = 'experts';
    protected $fillable = [
        'name', 'email', 'skype', 'phone', 'image'
    ];

    public function tours()
    {
        return $this->hasMany('App\Models\Tour');
    }
}
