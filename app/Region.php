<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
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
}
