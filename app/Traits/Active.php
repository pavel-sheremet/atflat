<?php


namespace App\Traits;


trait Active
{
    public function scopeActive ($query)
    {
        return $query->where('active', 1);
    }
}
