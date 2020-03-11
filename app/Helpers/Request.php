<?php


namespace App\Helpers;

/**
 * Class Request
 * @package App\Helpers
 */
class Request
{
    static function isFilterClear ()
    {
        return self::getFilters()->has('clear');
    }

    static function getFilters ()
    {
        return collect(request()->get('filter') ?: []);
    }

    static function getOrder ()
    {
        return collect(request()->get('order'));
    }

    static function getFiltersNumber ()
    {
        $result = [];

        if (!empty(self::getFilters()))
        {
            foreach (self::getFilters() as $name => $filters)
            {
                if ($name == 'clear') continue;

                $result[$name] = count(array_filter($filters, function ($item) {
                    if (is_array($item))
                    {
                        return !empty(array_diff($item, ['', false, null]));
                    }

                    return !empty($item);
                }));
            }
        }

        return collect($result);
    }

    static function getFiltersWithout ($name)
    {
        return self::getFilters()->except($name);
    }

    static function getFullUrlWithoutFilter ($name)
    {
        return url()->current().'?'.http_build_query(['filter' => self::getFiltersWithout($name)->all()]);
    }

    static function getClearedFilterFullUrl ()
    {
        return self::getFullUrlWithoutFilter([self::getFilters()->get('clear'), 'clear']);
    }
}
