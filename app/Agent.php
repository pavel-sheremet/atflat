<?php

namespace App;

use App\Filters\AgentFilter;
use App\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ActiveScope());
    }

    public function scopeFilter(Builder $builder, $request)
    {
        return (new AgentFilter($request))->filter($builder);
    }

    public function scopeOrder(Builder $builder, $request)
    {
        return (new AgentFilter($request))->order($builder);
    }

    public function user ()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function agency ()
    {
        return $this->hasOne(Agency::class, 'id', 'agency_id');
    }
}
