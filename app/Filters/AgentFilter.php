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

    protected $order;

    public function order(Builder $builder)
    {
        switch ($this->getOrder()[0])
        {
            case 'user_name' :
                return $builder->join('users', 'agents.user_id', '=', 'users.id')
                    ->orderBy('users.first_name', $this->getOrder()[1]);
        }

    }
}
