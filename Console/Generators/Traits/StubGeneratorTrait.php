<?php

namespace Zix\PluginBuilder\Console\Generators\Traits;

trait StubGeneratorTrait
{

    protected $stubPath;

    protected $generatePath;

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return $this->stubPath;
    }

    /**
     * Get the destination class path.
     *
     * @param  string  $name
     * @return string
     */
    protected function getPath($name)
    {
        $name = str_replace($this->laravel->getNamespace(), '', $name);
        return config('plugins.paths.plugins').$this->argument('module')."/{$this->generatePath}/".str_replace('\\', '/', $name).'.php';
    }

    /**
     * Get the full namespace name for a given class.
     *
     * @param  string  $name
     * @return string
     */
    protected function getNamespace($name)
    {
        return trim(implode('\\', array_slice(explode('\\', $this->getCommandNamespace($name)), 0, -1)), '\\');
    }

    /**
     * Replace the class name for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return string
     */
    protected function replaceClass($stub, $name)
    {
        $class = str_replace($this->getNamespace($name).'\\', '', $this->getCommandNamespace($name));
        return str_replace('DummyClass', $class, $stub);
    }

    /**
     * Get the full namespace name for this command.
     *
     * @param  string  $name
     * @return string
     */
    protected function getCommandNamespace($name)
    {
        $class = str_replace('/', '\\', $this->generatePath);
        return str_replace('App\\', "Zix\\{$this->argument('module')}\\{$class}\\", $name);
    }

}