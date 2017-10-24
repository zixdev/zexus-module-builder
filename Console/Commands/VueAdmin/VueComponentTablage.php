<?php

namespace Zix\PluginBuilder\Console\Commands\Vue;

use Illuminate\Console\GeneratorCommand;

class VueComponentTablage extends GeneratorCommand
{

	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'zix:command-name {name : The Command Name}
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
	    //
		parent::handle();
	}

	/**
	 * Get the stub file for the generator.
	 *
	 * @return string
	 */
	protected function getStub()
	{
		// TODO: Implement getStub() method.
	}

}
