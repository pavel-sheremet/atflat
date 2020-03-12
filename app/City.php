<?php

namespace App;

use App\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Model;
use Eloquent;

/**
 * Class City
 * @package App
 * @mixin Eloquent
 */
class City extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ActiveScope());
    }
}
