<?php

namespace Zix\PluginBuilder\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Zix\PluginBuilder\Console\Generators\Traits\StubGeneratorTrait;

/**
 * Class MakeCommand
 * @package Zix\PluginBuilder\Console\Commands
 */
class MakeCommand extends GeneratorCommand
{
    use StubGeneratorTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'zix:make-command {name : The Command Name}
                                             {module : The Module Name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Artisan command.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->generatePath = 'Console/Commands';
        $this->stubPath = 'plugins/PluginBuilder/Console/Commands/stubs/command.stub';

        parent::handle();
    }
}