# MediaCP On-Prem PHP SDK

`mediacontrolpanel/onprem-php-sdk` is a Composer package for working with the MediaCP On-Prem audio and video panel API from standalone PHP applications or Laravel projects.

The SDK exposes a small, predictable entry point:

```php
$mediacp = new MediaCP\Panel($config);
```

It includes typed helpers for common panel categories and raw HTTP methods for API endpoints that are not yet wrapped.

## Installation

```bash
composer require mediacontrolpanel/onprem-php-sdk
```

## Standalone PHP

```php
<?php

require __DIR__ . '/vendor/autoload.php';

$mediacp = new MediaCP\Panel([
    'base_url' => 'https://panel.example.com/api/',
    'auth_type' => 'bearer',
    'token' => 'your-api-token',
]);

$services = $mediacp->services()->list();
$service = $mediacp->services()->get(123);

$mediacp->services()->restart(123);
```

## Laravel

Laravel auto-discovers the service provider and facade after installation.

Publish the config file:

```bash
php artisan vendor:publish --tag=mediacp-config
```

Add environment values:

```dotenv
MEDIACP_BASE_URL=https://panel.example.com/api/
MEDIACP_AUTH_TYPE=bearer
MEDIACP_TOKEN=your-api-token
```

Use dependency injection:

```php
use MediaCP\Panel;

class ServiceController
{
    public function index(Panel $mediacp): array
    {
        return $mediacp->services()->list();
    }
}
```

Or use the facade:

```php
use MediaCP\Laravel\Facades\MediaCP;

$status = MediaCP::system()->status();
```

## Authentication

Bearer token:

```php
$mediacp = new MediaCP\Panel([
    'base_url' => 'https://panel.example.com/api/',
    'auth_type' => 'bearer',
    'token' => 'your-api-token',
]);
```

API key header:

```php
$mediacp = new MediaCP\Panel([
    'base_url' => 'https://panel.example.com/api/',
    'auth_type' => 'api_key',
    'api_key' => 'your-api-key',
    'api_key_header' => 'X-API-KEY',
]);
```

## Wrapped Categories

- [Panel client](docs/panel.md)
- [Accounts](docs/accounts.md)
- [Servers](docs/servers.md)
- [Services](docs/services.md)
- [Statistics](docs/statistics.md)
- [System](docs/system.md)
- [Users](docs/users.md)
- [Laravel integration](docs/laravel.md)

The docs are split to mirror the SDK categories. When an official Postman collection is added to this repository, new categories can be mapped directly into matching Markdown files.

## Raw Requests

Use raw request helpers for any MediaCP endpoint that is not yet represented by a typed resource method:

```php
$response = $mediacp->get('custom/endpoint', ['page' => 1]);

$created = $mediacp->post('custom/endpoint', [
    'name' => 'Example',
]);
```

## Tests

```bash
composer install
composer test
```

## License

MIT
