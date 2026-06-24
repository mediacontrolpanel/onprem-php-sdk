<?php

declare(strict_types=1);

namespace MediaCP\Http;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\RequestOptions;
use MediaCP\Exceptions\ApiException;
use MediaCP\Exceptions\ConfigurationException;
use Psr\Http\Message\ResponseInterface;

class Client
{
    private const DEFAULT_USER_AGENT = 'mediacontrolpanel/onprem-php-sdk';

    /**
     * @param array<string, mixed> $config
     */
    public function __construct(
        private array $config,
        private readonly ?ClientInterface $httpClient = null
    ) {
        $this->config = $this->normalizeConfig($config);
    }

    /**
     * @return array<string, mixed>
     */
    public function getConfig(): array
    {
        return $this->config;
    }

    /**
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function get(string $uri, array $query = []): array
    {
        return $this->request('GET', $uri, ['query' => $query]);
    }

    /**
     * @param array<string, mixed> $payload
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function post(string $uri, array $payload = [], array $query = []): array
    {
        return $this->request('POST', $uri, ['json' => $payload, 'query' => $query]);
    }

    /**
     * @param array<string, mixed> $payload
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function postForm(string $uri, array $payload = [], array $query = []): array
    {
        return $this->request('POST', $uri, ['form_params' => $payload, 'query' => $query]);
    }

    /**
     * @param array<string, mixed> $payload
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function put(string $uri, array $payload = [], array $query = []): array
    {
        return $this->request('PUT', $uri, ['json' => $payload, 'query' => $query]);
    }

    /**
     * @param array<string, mixed> $payload
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function patch(string $uri, array $payload = [], array $query = []): array
    {
        return $this->request('PATCH', $uri, ['json' => $payload, 'query' => $query]);
    }

    /**
     * @param array<string, mixed> $payload
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function patchForm(string $uri, array $payload = [], array $query = []): array
    {
        return $this->request('PATCH', $uri, ['form_params' => $payload, 'query' => $query]);
    }

    /**
     * @param array<string, mixed> $query
     *
     * @return array<string, mixed>
     */
    public function delete(string $uri, array $query = []): array
    {
        return $this->request('DELETE', $uri, ['query' => $query]);
    }

    /**
     * @param array<string, mixed> $options
     *
     * @return array<string, mixed>
     */
    public function request(string $method, string $uri, array $options = []): array
    {
        $options = $this->mergeRequestOptions($options);

        try {
            $response = $this->http()->request($method, $this->normalizeUri($uri), $options);
        } catch (RequestException $exception) {
            throw $this->apiExceptionFromRequestException($exception);
        } catch (GuzzleException $exception) {
            throw new ApiException($exception->getMessage(), 0, null, $exception);
        }

        return $this->decodeResponse($response);
    }

    private function http(): ClientInterface
    {
        if ($this->httpClient !== null) {
            return $this->httpClient;
        }

        return new GuzzleClient([
            'base_uri' => $this->config['base_url'],
            RequestOptions::TIMEOUT => $this->config['timeout'],
            RequestOptions::VERIFY => $this->config['verify'],
        ]);
    }

    /**
     * @param array<string, mixed> $options
     *
     * @return array<string, mixed>
     */
    private function mergeRequestOptions(array $options): array
    {
        $headers = array_merge(
            [
                'Accept' => 'application/json',
                'User-Agent' => self::DEFAULT_USER_AGENT,
            ],
            $this->config['headers'],
            $options['headers'] ?? []
        );

        if ($this->config['auth_type'] === 'bearer' && $this->config['token'] !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config['token'];
        }

        if ($this->config['auth_type'] === 'api_key' && $this->config['api_key'] !== null) {
            $headers[$this->config['api_key_header']] = $this->config['api_key'];
        }

        $options['headers'] = $headers;
        $options[RequestOptions::TIMEOUT] = $options[RequestOptions::TIMEOUT] ?? $this->config['timeout'];
        $options[RequestOptions::VERIFY] = $options[RequestOptions::VERIFY] ?? $this->config['verify'];

        return $options;
    }

    /**
     * @return array<string, mixed>
     */
    private function decodeResponse(ResponseInterface $response): array
    {
        $body = (string) $response->getBody();

        if ($body === '') {
            return [];
        }

        $decoded = json_decode($body, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new ApiException('MediaCP API returned invalid JSON: ' . json_last_error_msg(), $response->getStatusCode());
        }

        return is_array($decoded) ? $decoded : ['data' => $decoded];
    }

    private function apiExceptionFromRequestException(RequestException $exception): ApiException
    {
        $response = $exception->getResponse();

        if ($response === null) {
            return new ApiException($exception->getMessage(), 0, null, $exception);
        }

        $decoded = null;
        $body = (string) $response->getBody();

        if ($body !== '') {
            $json = json_decode($body, true);
            $decoded = is_array($json) ? $json : null;
        }

        $message = $decoded['message'] ?? $decoded['error'] ?? $exception->getMessage();

        return new ApiException((string) $message, $response->getStatusCode(), $decoded, $exception);
    }

    private function normalizeUri(string $uri): string
    {
        return ltrim($uri, '/');
    }

    /**
     * @param array<string, mixed> $config
     *
     * @return array<string, mixed>
     */
    private function normalizeConfig(array $config): array
    {
        $baseUrl = $config['base_url'] ?? $config['baseUrl'] ?? $config['url'] ?? null;

        if (! is_string($baseUrl) || trim($baseUrl) === '') {
            throw new ConfigurationException('MediaCP base_url is required.');
        }

        $authType = $config['auth_type'] ?? $config['authType'] ?? 'bearer';
        $authType = strtolower((string) $authType);

        if (! in_array($authType, ['bearer', 'api_key', 'none'], true)) {
            throw new ConfigurationException('MediaCP auth_type must be bearer, api_key, or none.');
        }

        return [
            'base_url' => rtrim($baseUrl, '/') . '/',
            'auth_type' => $authType,
            'token' => $config['token'] ?? $config['bearer_token'] ?? $config['bearerToken'] ?? null,
            'api_key' => $config['api_key'] ?? $config['apiKey'] ?? null,
            'api_key_header' => $config['api_key_header'] ?? $config['apiKeyHeader'] ?? 'X-API-KEY',
            'timeout' => (float) ($config['timeout'] ?? 30),
            'verify' => $config['verify'] ?? true,
            'headers' => $config['headers'] ?? [],
        ];
    }
}
