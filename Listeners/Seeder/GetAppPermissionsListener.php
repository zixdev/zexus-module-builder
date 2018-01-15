<?php

namespace Zix\PluginBuilder\Listeners\Seeder;


use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Zix\Core\Events\Seeder\GetAppPermissions;

class GetAppPermissionsListener
{
    /**
     * Handle the event.
     *
     * @param GetAppPermissions $event
     * @return void
     */
    public function handle(GetAppPermissions $event)
    {
        $event->collection->push('plugins');
    }
}
