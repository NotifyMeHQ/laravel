<?php

/*
 * This file is part of NotifyMe.
 *
 * (c) Joseph Cohen <joseph.cohen@dinkbit.com>
 * (c) Graham Campbell <graham@mineuk.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NotifyMeHQ\Laravel5;

use Illuminate\Support\ServiceProvider;
use NotifyMeHQ\NotifyMe\NotifyMeFactory;

class NotifyMeServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->setupConfig();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerFactory();
        $this->registerManager();
    }

    /**
     * Setup the config.
     *
     * @return void
     */
    protected function setupConfig()
    {
        $source = realpath(__DIR__.'/../config/notifyme.php');

        $this->publishes([$source => config_path('notifyme.php')]);

        $this->mergeConfigFrom($source, 'notifyme');
    }

    /**
     * Register the factory class.
     *
     * @return void
     */
    protected function registerFactory()
    {
        $this->app->singleton('notifyme.factory', function ($app) {
            return new NotifyMeFactory();
        });

        $this->app->alias('notifyme.factory', 'NotifyMeHQ\NotifyMe\NotifyMeFactory');
    }

    /**
     * Register the manager class.
     *
     * @return void
     */
    protected function registerManager()
    {
        $this->app->singleton('notifyme', function ($app) {
            $config = $app['config'];
            $factory = $app['notifyme.factory'];

            return new NotifyMeManager($config, $factory);
        });

        $this->app->alias('notifyme', 'NotifyMeHQ\Laravel5\NotifyMeManager');
        $this->app->alias('notifyme', 'NotifyMeHQ\NotifyMe\ManagerInterface');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides()
    {
        return [
            'notifyme',
            'notifyme.factory',
        ];
    }
}
