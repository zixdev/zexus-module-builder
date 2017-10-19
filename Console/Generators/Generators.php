<?php

namespace Zix\PluginBuilder\Console\Generators;

//use Illuminate\Console\AppNamespaceDetectorTrait;
use Illuminate\Filesystem\Filesystem;

class Generators
{
//    use AppNamespaceDetectorTrait;

    /**
     * The filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $filesystem;

    /**
     * The array of options.
     *
     * @var array
     */
    protected $options;

    /**
     * The shortname of stub.
     *
     * @var string
     */
    protected $stub;

    /**
     * The laravel console instance.
     *
     * @var Console
     */
    protected $console;

    /**
     * Create new instance of this class.
     *
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        $this->filesystem = new Filesystem();
        $this->options = $options;
    }

    /**
     * Get Module Name
     * @return mixed
     */
    public function getName()
    {
        return $this->console->argument('name');
    }

    /**
     * Set the laravel console instance.
     *
     * @param Console $console
     *
     * @return $this
     */
    public function setConsole($console)
    {
        $this->console = $console;
        return $this;
    }

    /**
     * Get plugins Config
     * @param $key
     * @return mixed
     */
    public function getConfig($key)
    {
        return app('config')->get('plugins.'.$key);
    }

    /**
     * Get array replacement for the specified stub.
     *
     * @return array
     */
    protected function getReplacement()
    {
        $replacements = $this->getConfig('stubs.replacements');
        $replaces = [];
        foreach ($replacements as $key) {
            if (method_exists($this, $method = 'get' . ucfirst(studly_case(strtolower($key))) . 'Replacement')) {
                $replaces[$key] = call_user_func([$this, $method]);
            } else {
                $replaces[$key] = null;
            }
        }
        return $replaces;
    }

    /**
     * Get the module name in lower case.
     *
     * @return string
     */
    protected function getLowerNameReplacement()
    {
        return strtolower($this->getName());
    }

    /**
     * Get the module name in studly case.
     *
     * @return string
     */
    protected function getStudlyNameReplacement()
    {
        return $this->getName();
    }

    /**
     * Get replacement for $VENDOR$.
     *
     * @return string
     */
    protected function getVendorReplacement()
    {
        return $this->getConfig('composer.vendor');
    }

    /**
     * Get replacement for $MODULE_NAMESPACE$.
     *
     * @return string
     */
    protected function getModuleNamespaceReplacement()
    {
        return str_replace('\\', '\\\\', $this->getConfig('namespace'));
    }

    /**
     * Get replacement for $MODULE_NAMESPACE$.
     *
     * @return string
     */
    protected function getNamespaceReplacement()
    {
        return $this->getConfig('namespace') . '\\'  .$this->getName();
//        return $this->getConfig('namespace') . '\\'  .$this->namespace;
    }

    /**
     * Get replacement for $CLASS$.
     *
     * @return string
     */
    protected function getClassReplacement()
    {
        return $this->getName();
//        return $this->console->argument('className');
    }

    /**
     * Get replacement for $AUTHOR_NAME$.
     *
     * @return string
     */
    protected function getAuthorNameReplacement()
    {
        return $this->getConfig('composer.author.name');
    }

    /**
     * Get replacement for $AUTHOR_EMAIL$.
     *
     * @return string
     */
    protected function getAuthorEmailReplacement()
    {
        return $this->getConfig('composer.author.email');
    }

}