<?php

namespace Zix\PluginBuilder\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Zix\PluginBuilder\Console\Generators\Traits\StubGeneratorTrait;

/**
 * Class MakeRequest
 * @package Zix\PluginBuilder\Console\Commands
 */
class MakeRequestCommand extends GeneratorCommand
{
	use StubGeneratorTrait;

	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'zix:make-request {name : The Request Name}
											 {module : The Module Name}';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a new Request class.';


	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
		$this->generatePath = 'Http/Requests';
		$this->stubPath = "plugins/PluginBuilder/Console/Commands/stubs/request.stub";

        parent::handle();
	}

}
