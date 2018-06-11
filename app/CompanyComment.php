<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyComment extends Model
{
    //
    public function rating()
    {
        return $this->hasOne('App\CompanyRating');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
