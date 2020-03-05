<?php


namespace App\Filters\Common;


class AgencyIdFilter
{
    public function filter($builder, $value)
    {
        return $builder->whereHas('agency', function($q) use ($value)
        {
            $q->whereIn('id', $value);
        });
    }
}
