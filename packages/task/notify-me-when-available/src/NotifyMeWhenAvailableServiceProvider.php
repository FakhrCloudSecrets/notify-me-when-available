<?php

namespace Task\NotifyMeWhenAvailable;

use Illuminate\Support\ServiceProvider;

class NotifyMeWhenAvailableServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Register bindings or services here
    }

    public function boot()
    {
        // Load routes, views, migrations, etc.
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadRoutesFrom(__DIR__.'/routes/api.php');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'notify-me-when-available');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->mergeConfigFrom(__DIR__.'/config/notify-me-when-available.php', 'notify-me-when-available');

        // Publish assets
        $this->publishes([
            __DIR__.'/config/notify-me-when-available.php' => config_path('notify-me-when-available.php'),
            __DIR__.'/resources/views' => resource_path('views/task/notify-me-when-available'),
        ]);
    }
}
