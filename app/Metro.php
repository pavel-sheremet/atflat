<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Metro
 * @package App
 * @mixin Eloquent
 */
class Metro extends Model
{
    protected $fillable = ['name', 'city_id'];

    public function realty ()
    {
        return $this->belongsToMany(Realty::class, 'realty_metro', 'metro_id', 'realty_id')->withPivot('distance');
    }

    public function city ()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }
}
