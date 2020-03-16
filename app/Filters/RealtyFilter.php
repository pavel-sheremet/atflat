<?php


namespace App\Filters;


use App\Filters\Common\UserIdFilter;

class RealtyFilter extends AbstractFilter
{
    protected $filters = [
        'user_id' => UserIdFilter::class,
    ];

    protected $name = 'realty';

    protected $order;

//    public function order(Builder $builder)
//    {
//        switch ($this->getOrder()->get('name'))
//        {
//            case 'user_name' :
//                return $builder->join('users', 'agents.user_id', '=', 'users.id')
//                    ->orderBy('users.name', $this->getOrder()->get('direction'));
//        }
//
//    }
}
