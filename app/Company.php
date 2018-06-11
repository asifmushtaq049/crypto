<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    public function rating()
    {
        return $this->hasMany('App\CompanyRating');
    }
}
