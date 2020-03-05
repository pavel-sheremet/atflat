<?php

namespace App;

use App\Filters\AgencyFilter;
use App\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ActiveScope());
    }

    public function scopeFilter(Builder $builder, $request)
    {
        return (new AgencyFilter($request))->filter($builder);
    }

    public function scopeOrder(Builder $builder, $request)
    {
        return (new AgencyFilter($request))->order($builder);
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
