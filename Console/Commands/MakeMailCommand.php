<?php

namespace Zix\PluginBuilder\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Zix\PluginBuilder\Console\Generators\Traits\StubGeneratorTrait;

/**
 * Class MakeMail
 * @package Zix\PluginBuilder\Console\Commands
 */
class MakeMailCommand extends GeneratorCommand
{
    use StubGeneratorTrait;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'zix:make-mail {name : The Mail Name}
										  {module : The Module Name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Mail class.';


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->generatePath = 'Mail';
        $this->stubPath = "plugins/PluginBuilder/Console/Commands/stubs/mail.stub";

        parent::handle();
    }

}
