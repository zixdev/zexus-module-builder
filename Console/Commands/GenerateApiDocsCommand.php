<?php

namespace Zix\PluginBuilder\Console\Commands;

use Illuminate\Console\ConfirmableTrait;
use Illuminate\Database\Console\Migrations\BaseCommand;

/**
 * Class GenerateApiDocs
 * @package Zix\PluginBuilder\Console\Commands
 */
class GenerateApiDocsCommand extends BaseCommand
{

	use ConfirmableTrait;

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'zix:docs';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Generate Zexus Documentation.';


	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
		$this->info('--------------------------------------------');
		$this->info('| Generating Api Docs                       |');
		$this->info('--------------------------------------------');

//		$this->call('api:generate --routePrefix=api/* --actAsUserId=1');
		$this->call('api:generate', [
			'--output'			=> 'documentation',
			'--routePrefix'		=> 'api/*',
//			'--header'			=> 'Authorization: Bearer jwt_token',
//			'--actAsUserId'		=> 1,
		]);
	}



}
