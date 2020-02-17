<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    public function user ()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function agency ()
    {
        return $this->hasOne(Agency::class, 'id', 'agency_id');
    }
}
