<?php

namespace App\Search\Filters;

use Illuminate\Database\Eloquent\Builder;

class Package
{
    public static function apply(Builder $query, $value)
    {
        return $query->whereIn('sales.package_id', $value);
    }
}

?>