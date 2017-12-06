<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function tags()
    {
    	return $this->belongsToMany('App\Models\Tag','post_tag');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
