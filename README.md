# NotifyMe Laravel 5

This is the Laravel 5 Bridge for NotifyMe.

## Installation

Add the following to your `composer.json` file.

```json
"require": {
    "notifymehq/laravel5": "~1.0"
}
```

Get the package installed.

```bash
$ composer update
```

Add the service provider to `app.php`

```php
'providers' => [
    // ...
    'NotifyMeHQ\Laravel5\NotifyMeServiceProvider',
],
```

If you want to use the Facade, also add the alias:

```php
'aliases' => [
    // ...
    'NotifyMe'  => 'NotifyMeHQ\Laravel5\Facades\Segment',
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

# Usage

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
