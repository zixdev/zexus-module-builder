<?php

namespace Zix\PluginBuilder\Console\Commands\VueAdmin;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;
use Zix\Core\Console\Generators\Traits\StubGeneratorTrait;

class VueRoutes extends GeneratorCommand
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
     * @param  string  $name
     * @return string
     */
    protected function getPath($name)
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);

        return $this->laravel['path'].'/'.str_replace('\\', '/', $name).'.js';
    }


}
