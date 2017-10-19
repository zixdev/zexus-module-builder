<?php

namespace Zix\PluginBuilder\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Zix\PluginBuilder\Console\Generators\Traits\StubGeneratorTrait;

/**
 * Class MakeProvider
 * @package Zix\PluginBuilder\Console\Commands
 */
class MakeProvider extends GeneratorCommand
{

    use StubGeneratorTrait;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'zix:make-provider {name : The Service Provider Name}
										      {module : The Module Name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Service Provider.';


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->generatePath = 'Providers';
        $this->stubPath = 'plugins/PluginBuilder/Console/Commands/stubs/provider.stub';

        parent::handle();
    }
}
