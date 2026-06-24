# Errors

SDK exceptions live under `MediaCP\Exceptions`.

## `ConfigurationException`

Thrown when required client configuration is missing or invalid.

```php
use MediaCP\Exceptions\ConfigurationException;

try {
    new MediaCP\Panel([]);
} catch (ConfigurationException $exception) {
    echo $exception->getMessage();
}
```

## `ApiException`

Thrown when the API request fails or returns invalid JSON.

```php
use MediaCP\Exceptions\ApiException;

try {
    $mediacp->services()->restart(456);
} catch (ApiException $exception) {
    $status = $exception->statusCode();
    $response = $exception->response();
}
```
