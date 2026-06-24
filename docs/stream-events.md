# Stream Events

Access stream event log endpoints through:

```php
$streamEvents = $mediacp->streamEvents();
```

### `list(array $query = []): array`

```php
$events = $mediacp->streamEvents()->list([
    'type' => 'all',
    'startDate' => '01/01/2026 00:00:00',
    'endDate' => '12/01/2026 00:00:00',
]);
```
