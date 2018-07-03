<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    //
    public function rating()
    {
        return $this->hasMany('App\WalletRating');
    }
    public function wishlist(){
        return $this->hasMany('App\WishList');
    }
}
