<?php namespace Zix\PluginBuilder\Console\Commands\Crud;

use Illuminate\Console\GeneratorCommand;
use Zix\PluginBuilder\Console\Generators\Traits\StubGeneratorTrait;

class CrudGeneratorCommand extends GeneratorCommand
{
    use StubGeneratorTrait;

    /**
     * Replace the namespace for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return $this
     */
    protected function replaceNamespace(&$stub, $name)
    {
        $stub = str_replace(
            [
                'DummyNamespace',
                'DummyRootNamespace',
                'NamespacedDummyUserModel',
                'ModelName',
                'PluginName',
                'ModelSmallName',
                'PluginSmallName'
            ],
            [
                $this->getNamespace($name),
                $this->rootNamespace(),
                config('auth.providers.users.model'),
                $this->argument('model'),
                $this->argument('module'),
                strtolower($this->argument('model')),
                strtolower($this->argument('module')),
            ],
            $stub
        );

        return $this;
    }
}