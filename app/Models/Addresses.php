<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Addresses extends Model
{
    public $guarded = [];

    public function district(){
        return $this->hasOne(ShipDistricts::class,'id','district_id');
    }
    public function city(){
        return $this->hasOne(ShipCities::class,'id','city_id');
    }
    public function state(){
        return $this->hasOne(ShipState::class,'id','state_id');
    }
}
