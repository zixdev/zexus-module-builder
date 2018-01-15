<?php

namespace Zix\PluginBuilder\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Zix\Core\Events\Seeder\GetAppPermissions;
use Zix\PluginBuilder\Listeners\Seeder\GetAppPermissionsListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        GetAppPermissions::class => [
            GetAppPermissionsListener::class,
        ]
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }


}
