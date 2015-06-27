<?php

/*
 * This file is part of NotifyMe.
 *
 * (c) Cachet HQ <support@cachethq.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NotifyMeHQ\Tests\Laravel;

use GrahamCampbell\TestBenchCore\ServiceProviderTrait;
use NotifyMeHQ\Laravel\NotifyMeManager;
use NotifyMeHQ\Contracts\ManagerInterface;
use NotifyMeHQ\NotifyMe\NotifyMeFactory;

/**
 * This is the service provider text class.
 *
 * @author Graham Campbell <graham@alt-three.com>
 */
class ServiceProviderTest extends AbstractTestCase
{
    use ServiceProviderTrait;

    public function testFactoryIsInjectable()
    {
        $this->assertIsInjectable(NotifyMeFactory::class);
    }

    public function testManagerIsInjectable()
    {
        $this->assertIsInjectable(NotifyMeManager::class);
        $this->assertIsInjectable(ManagerInterface::class);
    }
}
