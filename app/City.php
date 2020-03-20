<?php

namespace App;

use App\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Model;
use Eloquent;

/**
 * Class City
 * @package App
 * @mixin Eloquent
 */
class City extends Model
{
    protected $fillable = ['name'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = \Str::slug($model->name, '-');
        });

        static::addGlobalScope(new ActiveScope());
    }

}
