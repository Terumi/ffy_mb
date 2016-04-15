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
