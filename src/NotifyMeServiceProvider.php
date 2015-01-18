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

use Orchestra\Support\Providers\ServiceProvider;
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
        $this->addConfigComponent('notifymehq/notifyme', 'notifymehq/notifyme', realpath(__DIR__.'/../config'));
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
