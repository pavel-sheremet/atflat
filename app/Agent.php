<?php

namespace App;

use App\Traits\Active as ScopeActive;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use ScopeActive;

    public function user ()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function agency ()
    {
        return $this->hasOne(Agency::class, 'id', 'agency_id');
    }
}
