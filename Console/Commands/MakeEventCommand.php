<?php

namespace Zix\PluginBuilder\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Zix\PluginBuilder\Console\Generators\Traits\StubGeneratorTrait;

/**
 * Class MakeEvent
 * @package Zix\PluginBuilder\Console\Commands
 */
class MakeEventCommand extends GeneratorCommand
{

	use StubGeneratorTrait;

	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'zix:make-event {name : The Event Name}
										{module : The Module Name}';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a new Event class.';

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
		$this->stubPath = "plugins/PluginBuilder/Console/Commands/stubs/event.stub";
		$this->generatePath = 'Events';

        parent::handle();
	}
}
