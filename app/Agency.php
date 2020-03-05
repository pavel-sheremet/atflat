<?php

namespace App;

use App\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ActiveScope());
    }

    public function user ()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function agents ()
    {
        return $this->hasMany(Agent::class, 'agency_id', 'id');
    }
}
