<?php

/*
 * This file is part of NotifyMe.
 *
 * (c) Alt Three LTD <support@alt-three.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NotifyMeHQ\Tests\Laravel\Facades;

use GrahamCampbell\TestBenchCore\FacadeTrait;
use NotifyMeHQ\Laravel\Facades\NotifyMe;
use NotifyMeHQ\Laravel\NotifyMeManager;
use NotifyMeHQ\Tests\Laravel\AbstractTestCase;

/**
 * This is the notifyme facade test class.
 *
 * @author Graham Campbell <graham@alt-three.com>
 */
class NotifyMeTest extends AbstractTestCase
{
    use FacadeTrait;

    /**
     * Get the facade accessor.
     *
     * @return string
     */
    protected function getFacadeAccessor()
    {
        return 'notifyme';
    }

    /**
     * Get the facade class.
     *
     * @return string
     */
    protected function getFacadeClass()
    {
        return NotifyMe::class;
    }

    /**
     * Get the facade route.
     *
     * @return string
     */
    protected function getFacadeRoot()
    {
        return NotifyMeManager::class;
    }
}
