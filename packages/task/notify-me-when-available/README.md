# Creating a Laravel Package

## 1. Introduction

A Laravel package allows you to modularize your code, making it reusable across multiple projects. In this guide, we will go through creating a package called **NotifyMeWhenAvailable**, which enables users to get notified when an out-of-stock product becomes available.

## 2. Package Structure

A Laravel package typically follows a well-defined structure. Below is the structure of our package:

```
packages/
  ├── task/
      ├── notify-me-when-available/
          ├── src/
              ├── config/
              ├── database/
              ├── Http/
              ├── Mail/
              ├── Models/
              ├── Repositories/
              ├── resources/
              ├── routes/
              ├── NotifyMeWhenAvailableServiceProvider.php
          ├── vendor/
          ├── composer.json
          ├── LICENSE
```

### Explanation of Directories:

- **config/** - Stores configuration files for the package.
- **database/** - Contains migrations and seeders.
- **Http/** - Includes controllers and middleware.
- **Mail/** - Contains email notification classes.
- **Models/** - Defines Eloquent models.
- **Repositories/** - Handles database queries and business logic.
- **resources/** - Contains views, translations, and assets.
- **routes/** - Defines package-specific routes.
- **NotifyMeWhenAvailableServiceProvider.php** - The service provider that bootstraps the package.
- **composer.json** - Defines package metadata and dependencies.

## 3. Service Provider

A service provider is the central place where we register bindings, routes, event listeners, and configurations.

### Creating the Service Provider

In the `src/` directory, create `NotifyMeWhenAvailableServiceProvider.php`:

```php
<?php
namespace Task\NotifyMeWhenAvailable;

use Illuminate\Support\ServiceProvider;

class NotifyMeWhenAvailableServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        // Merge the package configuration with the application's config
        $this->mergeConfigFrom(
            __DIR__.'/config/notify.php', 'notify'
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        // Load routes
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        // Load migrations
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        // Load views
        $this->loadViewsFrom(__DIR__.'/resources/views', 'notify');

        // Publish assets and configurations
        $this->publishes([
            __DIR__.'/config/notify.php' => config_path('notify.php'),
        ], 'config');
    }
}
```

## 4. Package Boot Method

The `boot` method is responsible for loading everything the package needs, including:

- **Routes** using `loadRoutesFrom()`
- **Migrations** using `loadMigrationsFrom()`
- **Views** using `loadViewsFrom()`
- **Configuration files** using `publishes()`

## 5. Registering the Package

To use the package in Laravel, update `config/app.php`:

```php
'providers' => [
    Task\NotifyMeWhenAvailable\NotifyMeWhenAvailableServiceProvider::class,
];
```

## 6. Installing the Package

To install the package, use Composer:

```sh
composer require task/notify-me-when-available
```

Then, publish configurations and migrations:

```sh
php artisan vendor:publish --tag=config
php artisan migrate
```

## Conclusion

Now your package is fully set up and can be used within any Laravel application. It will handle product notifications when they become available, and notify users via email.

