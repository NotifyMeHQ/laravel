# NotifyMe Laravel


This is the Laravel 5 Bridge for NotifyMe.


## Installation

Either [PHP](https://php.net) 5.5+ or [HHVM](http://hhvm.com) 3.6+ are required.

To get the latest version of NotifyMe Laravel, simply require the project using [Composer](https://getcomposer.org):

```bash
$ composer require notifymehq/laravel
```

Instead, you may of course manually update your require block and run `composer update` if you so choose:

```json
{
    "require": {
        "notifymehq/laravel": "^1.0"
    }
}
```

Note that installing that package only pulls in the bare minimum and will not give you any adapters. You may require the adapters indiviually, or, require the whole deal (`notifymehq/notifyme`).

Add the service provider to `app.php`

```php
'providers' => [
    // ...
    'NotifyMeHQ\Laravel\NotifyMeServiceProvider',
],
```

If you want to use the Facade, also add the alias:

```php
'aliases' => [
    // ...
    'NotifyMe'  => 'NotifyMeHQ\Laravel\Facades\NotifyMe',
],
```

Install the configuration file.

```bash
$ php artisan config:publish
```

Configure your connections.

```php
return [
    'default' => 'slack',
    'connections' => [
        'slack' => [
            'driver' => 'slack',
            'from'   => 'notifyme',
            'token'  => 'your-token',
        ],
        'webhook' => [
            'driver' => 'webhook',
        ],
    ],
];
```


## Usage

```php
$response = NotifyMe::notify('#tests', 'This is working awesome!');

echo $response->isSent() ? 'Message sent' : 'Message going nowhere';
```

```php
$response = NotifyMe::connection('slack')->notify('#tests', 'This is working awesome!');

echo $response->isSent() ? 'Message sent' : 'Message going nowhere';
```

For more information about the usage go to [NotifyMe](https://github.com/notifymehq/notifyme).


## License

NotifyMe is licensed under [The MIT License (MIT)](LICENSE).
