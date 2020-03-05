<?php


namespace App\Filters\Common;


class UserNameFilter
{
    public function filter($builder, $value)
    {
        return $builder->whereHas('user', function($q) use ($value)
        {
            $q->where('first_name', 'like', '%'.$value.'%')->orWhere('last_name', 'like' , '%'.$value.'%');
        });
    }
}
