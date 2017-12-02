<?php

namespace Zix\PluginBuilder\Console\Commands\Crud;


class MakeCrudEventCommand extends CrudGeneratorCommand
{

	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
    protected $signature = 'crud:make-event {name : The Controller Name}
                                                {module : The Module Name}
                                                {model : The Module Name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new event class.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->generatePath = 'Events';
        $this->stubPath = "plugins/PluginBuilder/Console/Commands/stubs/event.crud.stub";

        parent::handle();
    }
}
