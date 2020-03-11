<?php


namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use App\Filters\Common\UserNameFilter;
use App\Filters\Common\AgencyIdFilter;

class AgentFilter extends AbstractFilter
{
    protected $filters = [
        'user_name' => UserNameFilter::class,
        'agency_id' => AgencyIdFilter::class
    ];

    protected $name = 'agent';

    protected $order;

    public function order(Builder $builder)
    {
        switch ($this->getOrder()->get('name'))
        {
            case 'user_name' :
                return $builder->join('users', 'agents.user_id', '=', 'users.id')
                    ->orderBy('users.name', $this->getOrder()->get('direction'));
        }

    }
}
