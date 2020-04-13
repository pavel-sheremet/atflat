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
        'user_id',
        'area',
        'type_id',
        'sub_price',
        'description',
        'rooms_number_id',
        'lat',
        'long',
        'province',
        'geo_area',
        'city_id',
        'vegetation',
        'district',
        'street',
        'house',
        'main_image_id'
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($model) {
            $model->metro()->detach();
            $model->images()->delete();
        });

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

    public function rooms ()
    {
        return $this->hasOne(RealtyRoomsNumber::class, 'id', 'rooms_number_id');
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

    public function images ()
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function main_image()
    {
        return $this->morphOne(File::class, 'fileable', false, 'id', 'main_image_id');
    }

    public function metro ()
    {
        return $this->belongsToMany(Metro::class, 'realty_metro','realty_id', 'metro_id')->withPivot('distance');
    }
}
