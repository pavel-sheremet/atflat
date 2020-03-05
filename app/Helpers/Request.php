<?php


namespace App\Helpers;


class Request
{
    static function isClear ()
    {
        return !empty(self::getFilters()) && array_key_exists('clear', self::getFilters());
    }

    static function getFilters ()
    {
        return request()->get('filter') ?: [];
    }

    static function getOrder ()
    {
        return explode(':', request()->get('order'));
    }

    static function getFiltersNumber ()
    {
        if (!empty(self::getFilters()))
        {
            return count(array_filter(self::getFilters(), function ($item) {
                if (is_array($item))
                {
                    return !empty(array_diff($item, ['', false, null]));
                }

                return !empty($item);
            }));
        }

        return 0;
    }

    static function getWithout ($params)
    {
        return url()->current().'?'.http_build_query(request()->except($params));
    }
}
