<?php

namespace App;

use App\Scopes\ActiveScope;
use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RealtyType
 * @package App
 * @mixin Eloquent
 */
class RealtyType extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ActiveScope());
    }
}
