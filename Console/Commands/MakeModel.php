<?php

namespace Zix\PluginBuilder\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;
use Zix\PluginBuilder\Console\Generators\Traits\StubGeneratorTrait;
use Symfony\Component\Console\Input\InputOption;

/**
 * Class MakeModel
 * @package Zix\PluginBuilder\Console\Commands
 */
class MakeModel extends GeneratorCommand
{
    use StubGeneratorTrait;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'zix:make-model {name : The Model Name}
										   {module : The Module Name}
										   {--migration}
										   {--m}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Model class.';


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->generatePath = 'Entities';
        $this->stubPath = "plugins/PluginBuilder/Console/Commands/stubs/model.stub";

        if (parent::handle() !== false) {
            if ($this->option('migration') || $this->option('m')) {
                $table = Str::plural(Str::snake(class_basename($this->argument('name'))));
                $this->call('zix:make-migration', [
                    'name' => "create_{$table}_table",
                    'module'    => $this->argument('module'),
                    'create' => $table
                ]);
            }
        }

    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['migration', 'm', InputOption::VALUE_NONE, 'Create a new migration file for the model.'],
        ];
    }

}
