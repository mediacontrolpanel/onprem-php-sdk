# Panel Client

`MediaCP\Panel` is the main SDK entry point. It accepts a configuration array and creates typed resource clients for MediaCP On-Prem API categories.

## Create a Client

```php
$mediacp = new MediaCP\Panel([
    'base_url' => 'https://panel.example.com/api/',
    'auth_type' => 'bearer',
    'token' => 'your-api-token',
]);
```

## Configuration

| Key | Type | Description |
| --- | --- | --- |
| `base_url` | string | Required API base URL. |
| `auth_type` | string | `bearer`, `api_key`, or `none`. Defaults to `bearer`. |
| `token` | string|null | Bearer token used when `auth_type` is `bearer`. |
| `api_key` | string|null | API key used when `auth_type` is `api_key`. |
| `api_key_header` | string | Header name for API key auth. Defaults to `X-API-KEY`. |
| `timeout` | float | Request timeout in seconds. Defaults to `30`. |
| `verify` | bool|string | SSL verification option passed to Guzzle. |
| `headers` | array | Extra headers included with every request. |

## Raw Request Methods

### `get(string $uri, array $query = []): array`

```php
$response = $mediacp->get('services', ['page' => 1]);
```

### `post(string $uri, array $payload = [], array $query = []): array`

```php
$response = $mediacp->post('services/123/restart');
```

### `put(string $uri, array $payload = [], array $query = []): array`

```php
$response = $mediacp->put('accounts/123', [
    'name' => 'Updated Account',
]);
```

### `patch(string $uri, array $payload = [], array $query = []): array`

```php
$response = $mediacp->patch('accounts/123', [
    'status' => 'active',
]);
```

### `delete(string $uri, array $query = []): array`

```php
$response = $mediacp->delete('users/123');
```

## Resource Accessors

```php
$mediacp->accounts();
$mediacp->servers();
$mediacp->services();
$mediacp->statistics();
$mediacp->system();
$mediacp->users();
```
