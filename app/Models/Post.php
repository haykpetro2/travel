<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $casts = [
        'tags' => 'array'
    ];
    protected $fillable = [
        'status', 'category_id', 'title_ru', 'title_en',
        'short_description_ru', 'short_description_en',
        'description_ru', 'description_en',
        'image', 'images', 'tags'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    public function tags()
    {
        return $this->hasMany('App\Models\PostTag');
    }

    public function photos()
    {
        return $this->hasMany('App\Models\PostImage');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment')->where('status', 1);
    }

}
