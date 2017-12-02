<?php

namespace Zix\PluginBuilder\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Zix\PluginBuilder\Console\Generators\Traits\StubGeneratorTrait;

/**
 * Class MakeSeeder
 * @package Zix\PluginBuilder\Console\Commands
 */
class MakeSeederCommand extends GeneratorCommand
{
	use StubGeneratorTrait;

	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'zix:make-seeder {name : The Seeder Name}
											{module : The Module Name}';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a new Seeder class.';


	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
		$this->generatePath = 'Database/Seeds';
		$this->stubPath = "plugins/PluginBuilder/Console/Commands/stubs/seeder.stub";

        parent::handle();
	}

}
