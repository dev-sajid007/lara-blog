<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public function user(){

        return $this->belongsTo('App\Models\User');
    }

    public function categories(){

        return $this->belongsToMany('App\Models\Category')->withTimestamps();
    }

    public function tags(){

        return $this->belongsToMany('App\Models\Tag')->withTimestamps();
    }

    public function favourite_to_user(){

        return $this->belongsToMany('App\Models\User')->withTimestamps();
    }

    public function comments(){

        return $this->hasMany('App\Models\Comment');
    }
}
