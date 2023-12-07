<?php

namespace Enesisrl\LaravelMasterNotificationsTrello\Providers;

use Enesisrl\LaravelMasterCore\Commands\Install;
use Illuminate\Support\ServiceProvider;

class LaravelMasterNotificationsTrello extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->publishes([
            __DIR__.'/../../master/Foundation/Notifications' => public_path("private/master/Foundation/Notifications/"),
            __DIR__.'/../../front/Main/Controllers/TrelloController.php' => public_path("private/front/Main/Controllers/TrelloController.php"),
            __DIR__.'/../../config/trello.php' => public_path("private/config/trello.php"),
        ],'notifications-trello-module-files');
        $this->loadRoutesFrom(__DIR__.'/../Front/Main/Routes/web.php');

    }
}

