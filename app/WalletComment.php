<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WalletComment extends Model
{
    //
    public function rating()
    {
        return $this->hasOne('App\WalletRating');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
