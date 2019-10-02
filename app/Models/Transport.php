<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    protected $table = 'transports';
    protected $fillable = [
        'name_ru', 'name_en', 'transport_type_id', 'transport_model_id', 'image',
        'person', 'motor', 'transmission', 'door', 'price', 'sale', 'trunk', 'driver',
        'short_description_ru', 'short_description_en', 'description_ru', 'description_en'
    ];


    public function type()
    {
        return $this->belongsTo('App\Models\TransportType', 'transport_type_id', 'id');
    }

    public function model()
    {
        return $this->belongsTo('App\Models\TransportModel', 'transport_model_id', 'id');

    }

    public function photos()
    {
        return $this->hasMany('App\Models\TransportGallery');
    }

    public function attributes()
    {
        return $this->hasMany('App\Models\TransportAttr');
    }

    public function prices()
    {
        return $this->hasMany('App\Models\TransportPrice');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment')->where('status', 1);
    }

    public function orders()
    {
        return $this->hasMany('App\Models\TransportOrder');
    }

}
