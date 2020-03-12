<?php

namespace App;

use App\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Model;
use Eloquent;

/**
 * Class Realty
 * @package App
 * @mixin Eloquent
 */
class Realty extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ActiveScope());
    }

    public function type ()
    {
        return $this->hasOne('App\RealtyType', 'id', 'type_id');
    }

    public function user ()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
