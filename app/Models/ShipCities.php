<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShipCities extends Model
{
    protected $table = 'cities';
    protected $fillable = [
        'city_name','district_id'
    ];

    public function district()
    {
        return $this->belongsTo(ShipDistricts::class, 'district_id');
    }
    public function state()
    {
        return $this->belongsTo(ShipState::class, 'state_id');
        
    }
}
