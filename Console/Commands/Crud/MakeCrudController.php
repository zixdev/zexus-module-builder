<?php

namespace Zix\PluginBuilder\Console\Commands\Crud;



class MakeCrudController extends CrudGeneratorCommand
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crud:make-controller {name : The Controller Name}
                                                {module : The Module Name}
                                                {model : The Module Name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Controller class.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->generatePath = 'Http/Controllers';
        $this->stubPath = 'plugins/PluginBuilder/Console/Commands/stubs/controller.crud.stub';

        parent::handle();
    }

}
