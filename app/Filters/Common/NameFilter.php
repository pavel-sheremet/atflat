<?php


namespace App\Filters\Common;


class NameFilter
{
    public function filter($builder, $value)
    {
        return $builder->where('name', 'like', '%'.$value.'%');
    }
}
