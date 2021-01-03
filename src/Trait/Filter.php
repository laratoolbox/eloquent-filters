<?php

namespace LaraToolbox\EloquentFilters\Traits;

trait Filter
{
    /**
     * Apply all relevant filters.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  $filters
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilter($query, $filters)
    {
        if (!is_subclass_of($filters, \LaraToolbox\EloquentFilters\FilterBase::class)) {
            // TODO: throw custom exception here!
        }

        return $filters->apply($query);
    }
}
