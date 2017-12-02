<?php

namespace Zix\PluginBuilder\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Zix\PluginBuilder\Console\Generators\Traits\StubGeneratorTrait;

/**
 * Class MakeMiddleware
 * @package Zix\PluginBuilder\Console\Commands
 */
class MakeMiddlewareCommand extends GeneratorCommand
{
    use StubGeneratorTrait;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'zix:make-middleware {name : The Middleware Name}
										        {module : The Module Name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Middleware class.';


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->generatePath = 'Http/Middleware';
        $this->stubPath = "plugins/PluginBuilder/Console/Commands/stubs/middleware.stub";

        parent::handle();
    }

}
