<?php

/*
 * This file is part of NotifyMe.
 *
 * (c) Cachet HQ <support@cachethq.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NotifyMeHQ\Laravel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * This is the notifyme facade class.
 *
 * @author Graham Campbell <graham@alt-three.com>
 */
class NotifyMe extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'notifyme';
    }
}
