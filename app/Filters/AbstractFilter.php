<?php


namespace App\Filters;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

abstract class AbstractFilter
{
    protected $request;

    protected $filters = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function filter(Builder $builder)
    {
        foreach($this->getFilters() as $filter => $value)
        {
            $this->resolveFilter($filter)->filter($builder, $value);
        }

        return $builder;
    }

    public function order(Builder $builder)
    {}

    protected function getOrder()
    {
        $result = [];

        $order_arr = \RequestHelper::getOrder()->get($this->name);

        if ($order_arr)
        {
            $order_key = array_key_first($order_arr);

            $result = [
                'name' => $order_key,
                'direction' => $order_arr[$order_key]
            ];
        }

        return collect($result);
    }

    protected function getFilters()
    {
        $filters = \RequestHelper::getFilters();
        $filter = $filters->has($this->name) ? $filters->get($this->name) : [];

        return array_filter($filter, function ($key) {
            return array_key_exists($key, $this->filters);
        }, ARRAY_FILTER_USE_KEY);
    }

    protected function resolveFilter($filter)
    {
        return new $this->filters[$filter];
    }
}
