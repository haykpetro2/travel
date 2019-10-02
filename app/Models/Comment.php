<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [
        'status', 'tour_id', 'hotel_id', 'transport_id', 'apartment_id', 'post_id', 'name', 'email', 'comment'
    ];

    public function post()
    {
        return $this->belongsTo('App\Models\Post', 'post_id', 'id');
    }

    public function transport()
    {
        return $this->belongsTo('App\Models\Transport', 'transport_id', 'id');
    }

    public function apartment()
    {
        return $this->belongsTo('App\Models\Apartment', 'apartment_id', 'id');
    }

    public function hotel()
    {
        return $this->belongsTo('App\Models\Hotel', 'hotel_id', 'id');
    }

    public function tour()
    {
        return $this->belongsTo('App\Models\Tour', 'tour_id', 'id');
    }

}

