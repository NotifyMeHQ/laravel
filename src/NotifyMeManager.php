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

use GrahamCampbell\Manager\AbstractManager;
use Illuminate\Contracts\Config\Repository;
use NotifyMeHQ\NotifyMe\NotifyMeFactory;

class NotifyMeManager extends AbstractManager
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
     * @param config[] $config
     *
     * @return \NotifyMeHQ\NotifyMe\GatewayInterface
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
