<?php

namespace Zix\PluginBuilder\Providers;

use Illuminate\Support\ServiceProvider;
use Zix\PluginBuilder\Console\Commands\Crud\MakeCrudCommand;
use Zix\PluginBuilder\Console\Commands\Crud\MakeCrudControllerCommand;
use Zix\PluginBuilder\Console\Commands\Crud\MakeCrudEventCommand;
use Zix\PluginBuilder\Console\Commands\MakeNotificationCommand;
use Zix\PluginBuilder\Console\Commands\MakePolicyCommand;
use Zix\PluginBuilder\Console\Commands\MakeProviderCommand;
use Zix\PluginBuilder\Console\Commands\MakeRequestCommand;
use Zix\PluginBuilder\Console\Commands\MakeResourceCommand;
use Zix\PluginBuilder\Console\Commands\MakeSeederCommand;
use Zix\PluginBuilder\Console\Commands\DatabaseSeedCommand;
use Zix\PluginBuilder\Console\Commands\GenerateApiDocsCommand;
use Zix\PluginBuilder\Console\Commands\MakeCommand;
use Zix\PluginBuilder\Console\Commands\MakeEventCommand;
use Zix\PluginBuilder\Console\Commands\MakeJobCommand;
use Zix\PluginBuilder\Console\Commands\MakeListenerCommand;
use Zix\PluginBuilder\Console\Commands\MakeMailCommand;
use Zix\PluginBuilder\Console\Commands\MakeMiddlewareCommand;
use Zix\PluginBuilder\Console\Commands\MakeMigrationCommand;
use Zix\PluginBuilder\Console\Commands\MakeModelCommand;
use Zix\PluginBuilder\Console\Commands\MakeTestCommand;
use Zix\PluginBuilder\Console\Commands\VueAdmin\VueRoutesCommand;


/**
 * Class ConsoleServiceProvider
 * @package Zix\Core\Providers
 */
class ConsoleServiceProvider extends ServiceProvider
{
    /**
     * The available command shortname.
     *
     * @var array
     */
    protected $commands = [
        DatabaseSeedCommand::class,
        GenerateApiDocsCommand::class,
        MakeCommand::class,
        MakeEventCommand::class,
        MakeJobCommand::class,
        MakeListenerCommand::class,
        MakeMailCommand::class,
        MakeMiddlewareCommand::class,
        MakeMigrationCommand::class,
        MakeModelCommand::class,
        MakeNotificationCommand::class,
        MakePolicyCommand::class,
        MakeProviderCommand::class,
        MakeRequestCommand::class,
        MakeSeederCommand::class,
        MakeTestCommand::class,
        MakeResourceCommand::class,

        // Crud Generators
        MakeCrudCommand::class,
        MakeCrudControllerCommand::class,
        MakeCrudEventCommand::class,

        // VueJs Admin Generators
        VueRoutesCommand::class
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands($this->commands);

    }
}
