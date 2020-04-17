<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * Class File
 * @package App
 * @mixin Eloquent
 */
class RentPeriod extends Model
{
    protected $fillable = [
        'code'
    ];

//    public function periodable()
//    {
//        return $this->morphTo();
//    }

    public function realty()
    {
        return $this->morphedByMany(Realty::class, 'rent_periodable');
    }
}
