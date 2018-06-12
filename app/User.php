<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    const ADMIN_TYPE = 'admin';
    const DEFAULT_TYPE = 'default';

    public function isAdmin()    {
        return $this->type === self::ADMIN_TYPE;
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function verifyUser()
    {
        return $this->hasOne('App\VerifyUser');
    }



    public function comments() {

         return $this->hasMany('App\Comment','user_id','id');
    }

    public function following() {
         return $this->hasMany('App\Follower','follower_id','id');
    }

    public function notifications() {
         return $this->hasMany('App\Notification','follower_id','id')->where('is_new',true);
    }

    public function followers() {
         return $this->hasMany('App\Follower','user_id','id');
    }

    public function isFollowing($id)
    {
        return !! $this->following()->where('follower_id', auth()->user()->id)->where('user_id', $id)->count();
    }

}
