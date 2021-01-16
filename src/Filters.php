<?php

namespace LaraToolbox\EloquentFilters;

abstract class Filters
{
    /**
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * The Eloquent builder.
     *
     * @var \Illuminate\Database\Eloquent\Builder
     */
    protected $builder;

    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [];

    /**
     * Create a new Filter instance.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function __construct($request = null)
    {
        if (is_null($request)) {
            $request = request();
        }

        $this->request = $request;
    }

    /**
     * Apply the filters.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply($builder)
    {
        $this->builder = $builder;

        foreach ($this->getFilters() as $filter => $value) {
            if (method_exists($this, $filter)) {
                $this->$filter($value);
            }
        }

        return $this->builder;
    }

    /**
     * Fetch all relevant filters from the request.
     *
     * @return array
     */
    public function getFilters()
    {
        return array_filter($this->request->only($this->filters), function ($value) {
            if (is_null($value)) {
                return false;
            }

            if ($value === '') {
                return false;
            }

            if (is_array($value) && count($value) === 0) {
                return false;
            }

            return true;
        });
    }
}
