<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $guarded = [];

    public function country()
    {
        return $this -> belongsTo(Country::class);
    }

    public function city()
    {
        return $this -> belongsTo(City::class);
    }

    public function region()
    {
        return $this -> belongsTo(Region::class);
    }
}
