<?php

namespace LaraToolbox\EloquentFilters\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeFilterCommand extends GeneratorCommand
{
    protected $name = 'make:filter';

    protected $description = 'Create a new filter class';

    protected $type = 'Filter';

    protected function getStub()
    {
        return __DIR__.'/stubs/filter.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Filters';
    }

    public function handle()
    {
        parent::handle();

        $this->info('Add this trait to your model for using filters:');
        $this->info('use \LaraToolbox\EloquentFilters\HasFilter;');
    }
}
