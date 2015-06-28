<?php

/*
 * This file is part of NotifyMe.
 *
 * (c) Alt Three LTD <support@alt-three.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Default Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the connections below you wish to use as
    | your default connection for all work. Of course, you may use many
    | connections at once using the manager class.
    |
    */

    'default' => 'webhook',

    /*
    |--------------------------------------------------------------------------
    | NotifyMe Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the connections setup for your application. Examples of
    | configuring each supported driver is shown below. You can of course have
    | multiple connections per driver (gateway).
    |
    */

    'connections' => [

        'campfire' => [
            'driver' => 'campfire',
            'from'   => 'notifyme',
            'token'  => 'your-token',
        ],

        'gitter' => [
            'driver' => 'gitter',
            'token'  => 'your-token',
        ],

        'hipchat' => [
            'driver' => 'hipchat',
            'from'   => 'notifyme',
            'token'  => 'your-token',
        ],

        'pagerduty' => [
            'driver' => 'pagerduty',
            'token'  => 'your-token',
        ],

        'pushover' => [
            'driver' => 'pushover',
            'token'  => 'your-token',
        ],

        'slack' => [
            'driver' => 'slack',
            'from'   => 'notifyme',
            'token'  => 'your-token',
        ],

        'twilio' => [
            'driver' => 'twilio',
            'from'   => 'your-phone',
            'client' => 'your-id',
            'token'  => 'your-token',
        ],

        'webhook' => [
            'driver'   => 'webhook',
            'endpoint' => 'https://example.com/notify',
        ],

        'yo' => [
            'driver' => 'yo',
            'token'  => 'your-token',
        ],

    ],

];
