<?php

/*
 * This file is part of NotifyMe.
 *
 * (c) Cachet HQ <support@cachethq.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NotifyMeHQ\Tests\Laravel5\Facades;

use GrahamCampbell\TestBench\Traits\FacadeTestCaseTrait;
use NotifyMeHQ\Tests\Laravel5\AbstractTestCase;

/**
 * This is the notifyme facade test class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class NotifyMeTest extends AbstractTestCase
{
    use FacadeTestCaseTrait;

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
        return 'NotifyMeHQ\Laravel5\Facades\NotifyMe';
    }

    /**
     * Get the facade route.
     *
     * @return string
     */
    protected function getFacadeRoot()
    {
        return 'NotifyMeHQ\Laravel5\NotifyMeManager';
    }
}
