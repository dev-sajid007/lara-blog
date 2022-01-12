<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){

        return $this->belongsTo('App\Models\Role');

    }

    public function posts(){

        return $this->hasMany('App\Models\Post');
    }

    public function favourite_to_post(){

        return $this->belongsToMany('App\Models\Post');
        //->withTimestamps();
    }

    public function comments(){

        return $this->hasMany('App\Models\Comment');
        //->withTimestamps();
    }

    public function scopeAuthors($query){

        return $query->where('role_id', 2);
    }
}
