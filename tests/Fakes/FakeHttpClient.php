<?php

declare(strict_types=1);

namespace MediaCP\Tests\Fakes;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Promise\Create;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class FakeHttpClient implements ClientInterface
{
    /**
     * @var array<int, array{method: string, uri: string, options: array<string, mixed>}>
     */
    public array $requests = [];

    /**
     * @param ResponseInterface|\Throwable $response
     */
    public function __construct(private ResponseInterface|\Throwable $response)
    {
    }

    /**
     * @param array<string, mixed> $options
     */
    public function send(RequestInterface $request, array $options = []): ResponseInterface
    {
        return $this->respond();
    }

    /**
     * @param array<string, mixed> $options
     */
    public function sendAsync(RequestInterface $request, array $options = []): PromiseInterface
    {
        return Create::promiseFor($this->send($request, $options));
    }

    /**
     * @param array<string, mixed> $options
     */
    public function request($method, $uri, array $options = []): ResponseInterface
    {
        $this->requests[] = [
            'method' => (string) $method,
            'uri' => (string) $uri,
            'options' => $options,
        ];

        return $this->respond();
    }

    /**
     * @param array<string, mixed> $options
     */
    public function requestAsync($method, $uri, array $options = []): PromiseInterface
    {
        return Create::promiseFor($this->request($method, $uri, $options));
    }

    /**
     * @return mixed|null
     */
    public function getConfig(?string $option = null)
    {
        return null;
    }

    private function respond(): ResponseInterface
    {
        if ($this->response instanceof \Throwable) {
            throw $this->response;
        }

        return $this->response;
    }
}
