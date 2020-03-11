<?php


namespace App\Filters;


use App\Filters\Common\NameFilter;
use Illuminate\Database\Eloquent\Builder;

class AgencyFilter extends AbstractFilter
{
    protected $filters = [
        'name' => NameFilter::class,
    ];

    protected $name = 'agency';

    protected $order;

    public function order(Builder $builder)
    {
        switch ($this->getOrder()[0])
        {
            case 'name' :
                return $builder->orderBy('name', $this->getOrder()[1]);
        }

    }
}
