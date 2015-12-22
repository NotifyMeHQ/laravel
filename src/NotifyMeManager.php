<?php

/*
 * This file is part of NotifyMe.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NotifyMeHQ\Laravel;

use GrahamCampbell\Manager\AbstractManager;
use Illuminate\Contracts\Config\Repository;
use NotifyMeHQ\Contracts\FactoryInterface;
use NotifyMeHQ\Contracts\ManagerInterface;

/**
 * This is the notifyme manager class.
 *
 * @author Graham Campbell <graham@alt-three.com>
 */
class NotifyMeManager extends AbstractManager implements ManagerInterface
{
    /**
     * The factory instance.
     *
     * @var \NotifyMeHQ\Contracts\FactoryInterface
     */
    protected $factory;

    /**
     * Create a new notifyme manager instance.
     *
     * @param \Illuminate\Contracts\Config\Repository $config
     * @param \NotifyMeHQ\Contracts\FactoryInterface  $factory
     *
     * @return void
     */
    public function __construct(Repository $config, FactoryInterface $factory)
    {
        parent::__construct($config);

        $this->factory = $factory;
    }

    /**
     * Create the connection instance.
     *
     * @param string[] $config
     *
     * @return \NotifyMeHQ\Contracts\GatewayInterface
     */
    protected function createConnection(array $config)
    {
        return $this->factory->make($config);
    }

    /**
     * Get the configuration name.
     *
     * @return string
     */
    protected function getConfigName()
    {
        return 'notifyme';
    }

    /**
     * Get the factory instance.
     *
     * @return \NotifyMeHQ\Contracts\FactoryInterface
     */
    public function getFactory()
    {
        return $this->factory;
    }
}
