<?php

namespace LaraToolbox\EloquentFilters;

trait HasFilter
{
    /**
     * Apply all relevant filters.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  $filter
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilter($query, $filter)
    {
        if (!is_subclass_of($filter, \LaraToolbox\EloquentFilters\Filters::class)) {
            // TODO: throw exception here!
        }

        return $filter->apply($query);
    }
}
