<?php

namespace App\Search\Filters;

use Illuminate\Database\Eloquent\Builder;

class Date
{
    public static function apply(Builder $query, $value, $field = 'sales.created_at')
    {

        $dates = explode('-', $value);
        $start_date = date('Y-m-d', strtotime(trim($dates[0])));
        $end_date = date('Y-m-d', strtotime(trim($dates[1])));
        return $query->whereBetween($field, [$start_date, $end_date]);
    }
}

?>