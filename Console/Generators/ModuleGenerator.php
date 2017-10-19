<?php

namespace Zix\PluginBuilder\Console\Generators;

use Zix\PluginBuilder\Support\Stub;

class PluginGenerator extends Generators
{

    /**
     * Generate the plugin.
     */
    public function generate()
    {
        if (!$this->filesystem->isDirectory(config('plugins.paths.plugins') . $this->getName())) {
            $this->generateFolders()->generateFiles();

            return $this->console->info("Plugin {$this->getName()} was successfully created !");
        }

        return $this->console->error("Plugin [{$this->getName()}] already exist!");
    }

    /**
     * Generate the folders.
     */
    public function generateFolders()
    {
        foreach ($this->getFolders() as $folder) {
            $this->filesystem->makeDirectory($this->getPath($folder), 0755, true);
        }
        return $this;
    }

    /**
     * Generate the files.
     */
    public function generateFiles()
    {
        foreach ($this->getFiles() as $stub => $file) {

            if (!$this->filesystem->isDirectory($this->getPath())) {
                $this->filesystem->makeDirectory($this->getPath(), 0775, true);
            }

            $this->filesystem->put($this->getPath($file), $this->getStubContents($stub));
            $this->console->info("Created : {$this->getPath($file)}");
        }

        return $this;
    }

    public function generateStub($type, $namespace, $name)
    {
        if (!$this->filesystem->isDirectory($this->getPath())) {
            $this->filesystem->makeDirectory($this->getPath(), 0775, true);
        }

        $this->filesystem->put($this->getPath($namespace . $name) . '.php', $this->getStubContents($type));

    }

    /**
     * Get new Plugin Path
     * @param string $folder
     * @return string
     */
    public function getPath($folder = '')
    {
        return $this->getConfig('paths.plugins') . $this->getName() . '/' . $folder;
    }

    /**
     * Get the list of folders will created.
     *
     * @return array
     */
    public function getFolders()
    {
        return array_values($this->getConfig('paths.generator'));
    }

    /**
     * Get the list of files will created.
     *
     * @return array
     */
    public function getFiles()
    {
        return $this->getConfig('stubs.files');
    }

    /**
     * Get the contents of the specified stub file by given stub name.
     *
     * @param $stub
     *
     * @return string
     */
    protected function getStubContents($stub)
    {
        $file_path = config('plugins.paths.plugins') . 'PluginBuilder/Console/Commands/stubs/' . $stub . '.stub';
//        $this->console->info('==+++>'.$stub);
        if ($this->filesystem->exists($file_path)) { // the stub exists
            return (new Stub(
                $file_path,
                $this->getReplacement())
            )->render();
        }
    }


}