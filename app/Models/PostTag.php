<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    protected $table = 'post_tags';
    protected $fillable = [
        'post_id', 'tag_id'
    ];

    public function post()
    {
        return $this->belongsTo('App\Models\Post', 'post_id', 'id');
    }

    public function tag()
    {
        return $this->belongsTo('App\Models\Tag', 'tag_id', 'id');
    }

}
