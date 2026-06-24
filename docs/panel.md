# Panel Client

`MediaCP\Panel` is the main SDK entry point. It accepts a configuration array and creates typed resource clients for MediaCP On-Prem API categories.

## Create a Client

```php
$mediacp = new MediaCP\Panel([
    'base_url' => 'https://panel.example.com',
    'auth_type' => 'bearer',
    'token' => 'your-api-token',
]);
```

## Configuration

| Key | Type | Description |
| --- | --- | --- |
| `base_url` | string | Required panel base URL, without `/api`. |
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
$response = $mediacp->get('api/0/media-service/list', ['page' => 1]);
```

### `post(string $uri, array $payload = [], array $query = []): array`

```php
$response = $mediacp->postForm('api/237/media-service/update', [
    'maxuser' => 500,
]);
```

### `put(string $uri, array $payload = [], array $query = []): array`

```php
$response = $mediacp->post('api/237/custom-json-endpoint', ['enabled' => true]);
```

### `patch(string $uri, array $payload = [], array $query = []): array`

```php
$response = $mediacp->patchForm('api/20/stream-targets/connect/1');
```

### `delete(string $uri, array $query = []): array`

```php
$response = $mediacp->delete('api/0/user/delete/17');
```

## Resource Accessors

```php
$mediacp->autoDj();
$mediacp->djs();
$mediacp->events();
$mediacp->jingles();
$mediacp->media();
$mediacp->playlists();
$mediacp->playlistTracks();
$mediacp->services();
$mediacp->sourceControl();
$mediacp->statistics();
$mediacp->streamEvents();
$mediacp->streamTargets();
$mediacp->users();
$mediacp->videoMedia();
```
