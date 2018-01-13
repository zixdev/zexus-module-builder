<?php

namespace Zix\PluginBuilder\Console\Commands;

use Illuminate\Database\Console\Migrations\BaseCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class DatabaseSeedCommand extends BaseCommand
{

	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $name = 'zix:db-seed';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Run database seeder from the specified module or from all plugins.';


	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
		$this->info('--------------------------------------------');
		$this->info('| Running Database Seeder                   |');
		$this->info('--------------------------------------------');

		$module = $this->argument('module');

		if (!empty($module)) {
			$this->line('Running Migrations For : <info>' . $this->argument('module') . '</info>');

			$this->call('db:seed', [
				'--class' => !empty($this->argument('name')) ? $this->argument('name') : $this->getSeederClass($this->argument('module')),
				'--database' => $this->option('database'),
			]);

			return;
		}

		$this->laravel['plugins']->all()->map(function($package) {
			$this->line('Running Migrations For : <info>' . $package->name() . '</info>');

                $this->call('db:seed', [
                    '--class' => !empty($this->argument('name')) ? $this->argument('name') : $this->getSeederClass($package->name()),
                    '--database' => $this->option('database'),
                ]);
		});

	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [
			['module', InputArgument::OPTIONAL, 'The name of module will be used.'],
			['name', InputArgument::OPTIONAL, 'The name of seeder class']
		];
	}

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['database', null, InputOption::VALUE_OPTIONAL, 'The database connection to use.'],
            ['class', null, InputOption::VALUE_NONE, 'The seeder class name.'],
        ];
    }

    private function getSeederClass($module)
    {
        return "Zix\\" . $module . "\\Database\\Seeds\\" . $module . "DataBaseSeeder";
    }


}
