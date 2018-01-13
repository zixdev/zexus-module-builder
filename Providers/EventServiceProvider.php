<?php

namespace Zix\PluginBuilder\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Zix\Core\Events\Seeder\AppPermissionsCreate;
use Zix\PluginBuilder\Listeners\Seeder\AppPermissionsCreateListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        AppPermissionsCreate::class => [
            AppPermissionsCreateListener::class,
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
