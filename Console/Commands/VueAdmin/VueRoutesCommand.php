<?php

namespace Zix\PluginBuilder\Console\Commands\VueAdmin;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;
use Zix\Core\Console\Generators\Traits\StubGeneratorTrait;

class VueRoutesCommand extends GeneratorCommand
{
    use StubGeneratorTrait;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'zix:va-route {name : The Command Name}
										{module : The Module Name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description.';


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->generatePath = 'Assets/admin/js/routes';
        $this->stubPath = 'plugins/PluginBuilder/Console/Commands/stubs/vue-admin/route.stub';

        parent::handle();
    }

    /**
     * Get the destination class path.
     *
     * @param  string $name
     * @return string
     */
    protected function getPath($name)
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);
        return base_path('plugins/' . $this->argument('module') . '/Assets/admin/js/routes/' . $name . '.js');
    }

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
            ['Path', 'Name', 'Component', 'Permission'],
            [
                $this->argument('name'),
                $this->argument('name'),
                $this->argument('name'),
                $this->argument('name'),
            ],
            $stub
        );

        return $this;
    }


}
