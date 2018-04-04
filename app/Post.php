<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'featured', 'content', 'category_id', 'slug', 'user_id'];
    protected $dates = ['deleted_at'];

    public function getFeaturedAttribute($featured)
    {
        $featured = str_replace('public', 'storage', $featured);
        return $featured;
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
