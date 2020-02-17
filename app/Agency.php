<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    public function user ()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function agents ()
    {
        return $this->hasMany(Agent::class, 'agency_id', 'id');
    }
}
