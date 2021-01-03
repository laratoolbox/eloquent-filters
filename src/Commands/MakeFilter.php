<?php

namespace LaraToolbox\EloquentFilters\Commands;

use Illuminate\Console\Command;

class MakeFilter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:filter {class}';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Filter';

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
        $filterClass = $this->argument('class');

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

        $filtersPath = config('eloquent_filters.base_folder', app_path('Filters'));
        if (!is_dir($filtersPath)) {
            mkdir($filtersPath, 0777, true);
        }

        file_put_contents(
            "$filtersPath/$filterClass.php",
            $filterContent
        );

        $this->info('Filter created.');
        $this->info('Add trait into your model: "use \LaraToolbox\EloquentFilters\Traits\Filters;"');
        return 0;
    }

    private function getStub()
    {
        // TODO: make stub customizable
        return '<?php'.PHP_EOL.PHP_EOL.file_get_contents(dirname(__FILE__).'/../stub/filter.stub');
    }
}
