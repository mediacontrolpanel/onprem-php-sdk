<?php

declare(strict_types=1);

namespace MediaCP\Exceptions;

use Throwable;

class ApiException extends MediaCPException
{
    /**
     * @param array<string, mixed>|null $response
     */
    public function __construct(
        string $message,
        private readonly int $statusCode = 0,
        private readonly ?array $response = null,
        ?Throwable $previous = null
    ) {
        parent::__construct($message, $statusCode, $previous);
    }

    public function statusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @return array<string, mixed>|null
     */
    public function response(): ?array
    {
        return $this->response;
    }
}
