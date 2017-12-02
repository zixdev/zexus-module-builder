<?php

namespace Zix\PluginBuilder\Console\Commands\Crud;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;
use Zix\PluginBuilder\Console\Generators\Traits\StubGeneratorTrait;

class MakeCrud extends GeneratorCommand
{
    use StubGeneratorTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'zix:crud {name : Model Name}
										{module : The Plugin Name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Crud Model';


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->argument('name');
        $plugin = $this->argument('module');

        // 1. Generate Model
        $this->call("zix:make-model", [
            'name' => $name,
            'module' => $plugin,
        ]);
        $table = Str::plural(Str::snake(class_basename($name)));
        $this->call('zix:make-migration', [
            'name' => "create_{$table}_table",
            'module' => $plugin,
            'create' => $table
        ]);

        // 2. Generate Seeder
        $this->call("zix:make-seeder", [
            'name' => $name . "TableSeeder",
            'module' => $plugin,
        ]);

        // 3. Generate Factory @TODO

        // 4. Generate Controller + (Request "create/update") + (Test)
        $this->call("crud:make-controller", [
            'name' => $name . "Controller",
            'module' => $plugin,
            'model' => $name,
        ]);
        $this->call("zix:make-request", [
            'name' => $name . '/' . $name . "CreateRequest",
            'module' => $plugin,
        ]);
        $this->call("zix:make-request", [
            'name' => $name . '/' . $name . "UpdateRequest",
            'module' => $plugin,
        ]);
        $this->call("crud:make-test", [
            'name' => $name . "ControllerTester",
            'module' => $plugin,
            'model' => $name,
        ]);


        // 5. Generate Routes
        // 6. Generate Route Permission Seeder & seed

        // 7. Generate Events
        $this->call("crud:make-event", [
            'name' => $name . '/' . $name . "CreatedEvent",
            'module' => $plugin,
            'model' => $name,
        ]);
        $this->call("crud:make-event", [
            'name' => $name . '/' . $name . "UpdatedEvent",
            'module' => $plugin,
            'model' => $name,
        ]);

        // 8. Generate Listeners
        $this->call("zix:make-listener", [
            'name' => $name . '/' . $name . "CreateEvent",
            'module' => $plugin,
        ]);
        $this->call("zix:make-listener", [
            'name' => $name . '/' . $name . "UpdateEvent",
            'module' => $plugin,
        ]);

        // 9. Generate Front-End Vue init


        parent::handle();
    }

}
