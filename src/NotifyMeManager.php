<?php

/*
 * This file is part of NotifyMe.
 *
 * (c) Cachet HQ <support@cachethq.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NotifyMeHQ\Laravel;

use GrahamCampbell\Manager\AbstractManager;
use Illuminate\Contracts\Config\Repository;
use NotifyMeHQ\Contracts\ManagerInterface;
use NotifyMeHQ\NotifyMe\NotifyMeFactory;

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
     * @var \NotifyMeHQ\NotifyMe\NotifyMeFactory
     */
    protected $factory;

    /**
     * Create a new notifyme manager instance.
     *
     * @param \Illuminate\Contracts\Config\Repository $config
     * @param \NotifyMeHQ\NotifyMe\NotifyMeFactory    $factory
     *
     * @return void
     */
    public function __construct(Repository $config, NotifyMeFactory $factory)
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
     * @return \NotifyMeHQ\NotifyMe\NotifyMeFactory
     */
    public function getFactory()
    {
        return $this->factory;
    }
}
