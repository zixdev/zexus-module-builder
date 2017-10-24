<?php

namespace Zix\PluginBuilder\Providers;

use Illuminate\Support\ServiceProvider;
use Zix\PluginBuilder\Console\Commands\MakeNotification;
use Zix\PluginBuilder\Console\Commands\MakePolicy;
use Zix\PluginBuilder\Console\Commands\MakeProvider;
use Zix\PluginBuilder\Console\Commands\MakeRequest;
use Zix\PluginBuilder\Console\Commands\MakeSeeder;
use Zix\PluginBuilder\Console\Commands\DatabaseSeedCommand;
use Zix\PluginBuilder\Console\Commands\GenerateApiDocs;
use Zix\PluginBuilder\Console\Commands\MakeCommand;
use Zix\PluginBuilder\Console\Commands\MakeEvent;
use Zix\PluginBuilder\Console\Commands\MakeJob;
use Zix\PluginBuilder\Console\Commands\MakeListener;
use Zix\PluginBuilder\Console\Commands\MakeMail;
use Zix\PluginBuilder\Console\Commands\MakeMiddleware;
use Zix\PluginBuilder\Console\Commands\MakeMigration;
use Zix\PluginBuilder\Console\Commands\MakeModel;
use Zix\PluginBuilder\Console\Commands\MakeTest;
use Zix\PluginBuilder\Console\Commands\VueAdmin\VueRoutes;


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
        GenerateApiDocs::class,
        MakeCommand::class,
        MakeEvent::class,
        MakeJob::class,
        MakeListener::class,
        MakeMail::class,
        MakeMiddleware::class,
        MakeMigration::class,
        MakeModel::class,
        MakeNotification::class,
        MakePolicy::class,
        MakeProvider::class,
        MakeRequest::class,
        MakeSeeder::class,
        MakeTest::class,


        // VueJs Admin Generators
        VueRoutes::class
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
