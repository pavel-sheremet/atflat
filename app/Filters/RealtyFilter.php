<?php


namespace App\Filters;


use App\Filters\Common\UserIdFilter;
use Illuminate\Database\Eloquent\Builder;

class RealtyFilter extends AbstractFilter
{
    protected $filters = [
        'user_id' => UserIdFilter::class,
    ];

    protected $name = 'realty';

    protected $order;

    public function order(Builder $builder)
    {
        parent::order($builder);

        switch ($this->getOrder()->get('name'))
        {
            case 'user_name' :
                return $builder->join('users', 'agents.user_id', '=', 'users.id')
                    ->orderBy('users.name', $this->getOrder()->get('direction'));
        }
    }

    public function defaultOrder (Builder $builder)
    {
        return $builder->orderBy('created_at', 'desc');
    }
}
