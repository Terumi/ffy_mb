<?php

namespace ffy\mailbox;

use Illuminate\Support\ServiceProvider;

class MailboxServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../views', 'mailbox');

        $this->publishes([
            __DIR__ . '/../views' => base_path('resources/views/vendor/mailbox')
        ], 'views');

        $this->publishes([
            __DIR__.'/../js/' => base_path('resources/assets/js/')
        ], 'js');

        // Publish your migrations
        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('/migrations')
        ], 'migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('mailbox', function () {
            return $this->app->make('ffy\mailbox\Mailbox');
        });



        include __DIR__ . '/Http/routes.php';
    }

}
