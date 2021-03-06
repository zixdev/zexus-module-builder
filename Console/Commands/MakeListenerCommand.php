<?php

namespace Zix\PluginBuilder\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Zix\PluginBuilder\Console\Generators\Traits\StubGeneratorTrait;

/**
 * Class MakeListener
 * @package Zix\PluginBuilder\Console\Commands
 */
class MakeListenerCommand extends GeneratorCommand
{
	use StubGeneratorTrait;

	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'zix:make-listener {name : The Listener Name}
											  {module : The Module Name}';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a new Listener class.';


	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
		$this->generatePath = 'Listeners';
		$this->stubPath = "plugins/PluginBuilder/Console/Commands/stubs/listener.stub";

        parent::handle();
	}

}
