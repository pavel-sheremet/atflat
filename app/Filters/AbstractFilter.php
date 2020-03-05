<?php


namespace App\Filters;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use \App\Helpers\Request as RequestHelper;

abstract class AbstractFilter
{
    protected $request;

    protected $filters = [];
    protected $order = [];

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
        return RequestHelper::getOrder();
    }

    protected function getFilters()
    {
        $filter = RequestHelper::getFilters();

        return array_filter($filter, function ($key) {
            return array_key_exists($key, $this->filters);
        }, ARRAY_FILTER_USE_KEY);
    }

    protected function resolveFilter($filter)
    {
        return new $this->filters[$filter];
    }
}
