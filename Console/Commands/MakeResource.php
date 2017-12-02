<?php

namespace Zix\PluginBuilder\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;
use Zix\Core\Console\Generators\Traits\StubGeneratorTrait;

/**
 * Class MakeResource
 * @package Zix\PluginBuilder\Console\Commands
 */
class MakeResource extends GeneratorCommand
{
    use StubGeneratorTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'zix:make-resource {name : The Resource Name}
											 {module : The Module Name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Resource class.';


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->generatePath = 'Http/Resources';
//        $this->stubPath = "plugins/PluginBuilder/Console/Commands/stubs/resource.stub";

        if ($this->collection()) {
            $this->type = 'Resource collection';
        }
        parent::handle();
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return $this->collection()
            ? __DIR__ . '/stubs/resource-collection.stub'
            : __DIR__ . '/stubs/resource.stub';
    }

    /**
     * Determine if the command is generating a resource collection.
     *
     * @return bool
     */
    protected function collection()
    {
        return Str::endsWith($this->argument('name'), 'Collection');
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['collection', 'c', InputOption::VALUE_NONE, 'Create a resource collection.'],
        ];
    }
}
