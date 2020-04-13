<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Eloquent;
use Illuminate\Support\Facades\Storage;

/**
 * Class File
 * @package App
 * @mixin Eloquent
 */
class File extends Model
{
    protected $fillable = [
        'mime_type',
        'bytes',
        'disk',
        'path',
        'client_name',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            \Auth::user()->files()->forDeleteByDate()->get()->each(function ($item) {
                $item->delete();
            });
        });

        static::deleting(function ($model) {
            Storage::disk($model->disk)->delete($model->path);
        });
    }

    public function scopeUnused($query)
    {
        return $query->where('used', false);
    }

    public function scopeForDeleteByDate($query, $days = 3)
    {
        return $query
            ->unused()
            ->whereDate('created_at', '<', Carbon::today()->subDays($days));
    }

    public function fileable()
    {
        return $this->morphTo();
    }

    public function realty()
    {
        return $this->morphedByMany(Realty::class, 'fileable');
    }

    public function getFullUrlAttribute() {
        return \Storage::disk('upload')->url($this->path);
    }
}
