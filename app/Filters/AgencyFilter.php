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

    public function order(Builder $builder)
    {
        parent::order($builder);

        switch ($this->getOrder()->get('name'))
        {
            case 'name' :
                return $builder->orderBy('name', $this->getOrder()->get('direction'));
        }
    }

    public function defaultOrder (Builder $builder)
    {
        return $builder->orderBy('name', 'asc');
    }
}
