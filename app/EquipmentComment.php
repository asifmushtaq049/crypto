<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipmentComment extends Model
{
    //
    public function rating()
    {
        return $this->hasOne('App\EquipmentRating');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
