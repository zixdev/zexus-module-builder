<?php

namespace Zix\PluginBuilder\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Zix\PluginBuilder\Console\Generators\Traits\StubGeneratorTrait;

/**
 * Class MakeJob
 * @package Zix\PluginBuilder\Console\Commands
 */
class MakeJobCommand extends GeneratorCommand
{
    use StubGeneratorTrait;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'zix:make-job {name : The Job Name}
										 {module : The Module Name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Job class.';


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->generatePath = 'Jobs';
        $this->stubPath = "plugins/PluginBuilder/Console/Commands/stubs/job.stub";

        parent::handle();
    }


}
