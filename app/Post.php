<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['title','detail', 'type', 'user_id'];

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function wishlist(){
        return $this->hasMany('App\WishList');
    }
}
