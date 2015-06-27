<?php

/*
 * This file is part of NotifyMe.
 *
 * (c) Alt Three LTD <support@alt-three.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NotifyMeHQ\Laravel;

use Illuminate\Support\ServiceProvider;
use NotifyMeHQ\Contracts\FactoryInterface;
use NotifyMeHQ\Contracts\ManagerInterface;
use NotifyMeHQ\NotifyMe\NotifyMeFactory;

/**
 * This is the notifyme service provider class.
 *
 * @author Graham Campbell <graham@alt-three.com>
 */
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

        if (class_exists('Illuminate\Foundation\Application', false)) {
            $this->publishes([$source => config_path('notifyme.php')]);
        }

        $this->mergeConfigFrom($source, 'notifyme');
    }

    /**
     * Register the factory class.
     *
     * @return void
     */
    protected function registerFactory()
    {
        $this->app->singleton('notifyme.factory', function () {
            return new NotifyMeFactory();
        });

        $this->app->alias('notifyme.factory', NotifyMeFactory::class);
        $this->app->alias('notifyme.factory', FactoryInterface::class);
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

        $this->app->alias('notifyme', NotifyMeManager::class);
        $this->app->alias('notifyme', ManagerInterface::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides()
    {
        return [
            'notifyme.factory',
            'notifyme',
        ];
    }
}
