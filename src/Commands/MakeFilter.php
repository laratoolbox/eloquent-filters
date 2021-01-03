<?php

namespace LaraToolbox\EloquentFilters\Commands;

use Illuminate\Console\Command;

class ShowTableColumnsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:filter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new filter class';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $filterClass = $this->option('name');

        $filterContent = str_replace(
            [
                '{namespace}',
                '{className}',
            ],
            [
                config('eloquent_filters.namespace', 'App\Filters'),
                $filterClass,
            ],
            $this->getStub()
        );

        file_put_contents(
            "$filterClass.php",
            config('eloquent_filters.base_folder', app_path('Filters'))
        );

        $this->info('Filter created.');
        return 0;
    }

    private function getStub()
    {
        // TODO: make stub customizable
        return '<?php'.PHP_EOL.PHP_EOL.file_get_contents('../stub/filter.stub');
    }
}
