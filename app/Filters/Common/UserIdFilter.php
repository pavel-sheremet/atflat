<?php


namespace App\Filters\Common;


class UserIdFilter
{
    public function filter($builder, $value)
    {
        return $builder->whereHas('user', function($q) use ($value)
        {
            $q->whereIn('id', $value);
        });
    }
}
