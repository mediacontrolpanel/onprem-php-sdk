# Laravel

The package supports Laravel auto-discovery. After installation, Laravel registers `MediaCP\Laravel\MediaCPServiceProvider` automatically.

## Publish Config

```bash
php artisan vendor:publish --tag=mediacp-config
```

## Environment

```dotenv
MEDIACP_BASE_URL=https://panel.example.com/api/
MEDIACP_AUTH_TYPE=bearer
MEDIACP_TOKEN=your-api-token
MEDIACP_TIMEOUT=30
MEDIACP_VERIFY_SSL=true
```

For API key authentication:

```dotenv
MEDIACP_AUTH_TYPE=api_key
MEDIACP_API_KEY=your-api-key
MEDIACP_API_KEY_HEADER=X-API-KEY
```

## Dependency Injection

```php
use MediaCP\Panel;

class StreamController
{
    public function restart(Panel $mediacp, int $serviceId): array
    {
        return $mediacp->services()->restart($serviceId);
    }
}
```

## Facade

```php
use MediaCP\Laravel\Facades\MediaCP;

$services = MediaCP::services()->list();
```

## Container Binding

The service provider registers:

```php
app(MediaCP\Panel::class);
app('mediacp');
```
