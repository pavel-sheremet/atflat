<?php

namespace App;

use App\Filters\AgencyFilter;
use App\Scopes\ActiveScope;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * class Agency
 *
 * @mixin Eloquent
 */
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

    public function owner ()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function agents ()
    {
        return $this->hasMany(Agent::class, 'agency_id', 'id');
    }

    public function users ()
    {
        return $this->hasManyThrough(
            User::class,
            Agent::class,
            'agency_id',
            'id'
        )->withoutGlobalScopes();
    }

    public function realty ()
    {
        return $this->hasManyThrough(
            Realty::class,
            Agent::class,
            'agency_id',
            'user_id',
            'id',
            'user_id'
        )->withoutGlobalScopes();
    }
}
