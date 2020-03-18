<?php

namespace App;

use App\Filters\RealtyFilter;
use App\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Eloquent;

/**
 * Class Realty
 * @package App
 * @mixin Eloquent
 */
class Realty extends Model
{
    protected $fillable = [
        'price',
        'type_id',
        'sub_price',
        'lat',
        'long',
        'city_id',
        'street',
        'description',
        'rooms_number_id'
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ActiveScope());
    }

    public function scopeFilter(Builder $builder, $request)
    {
        return (new RealtyFilter($request))->filter($builder);
    }

    public function scopeOrder(Builder $builder, $request)
    {
        return (new RealtyFilter($request))->order($builder);
    }

    public function type ()
    {
        return $this->hasOne('App\RealtyType', 'id', 'type_id');
    }

    public function user ()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function agency ()
    {
        return $this->hasOneThrough(
            Agency::class,
            Agent::class,
            'user_id',
            'id',
            'user_id',
            'agency_id'
        )->withoutGlobalScopes();
    }

    public function file()
    {
        return $this->morphMany(File::class, 'fileable');
    }
}
