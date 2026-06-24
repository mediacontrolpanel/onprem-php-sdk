<?php

declare(strict_types=1);

namespace MediaCP\Tests;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use MediaCP\Exceptions\ApiException;
use MediaCP\Exceptions\ConfigurationException;
use MediaCP\Http\Client;
use MediaCP\Tests\Fakes\FakeHttpClient;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    public function testItSendsBearerAuthenticatedJsonRequests(): void
    {
        $http = new FakeHttpClient(new Response(200, [], '{"ok":true}'));
        $client = new Client([
            'base_url' => 'https://panel.example.com',
            'token' => 'secret-token',
        ], $http);

        $response = $client->post('/api/237/custom-json-endpoint', ['force' => true]);

        self::assertSame(['ok' => true], $response);
        self::assertSame('POST', $http->requests[0]['method']);
        self::assertSame('api/237/custom-json-endpoint', $http->requests[0]['uri']);
        self::assertSame(['force' => true], $http->requests[0]['options']['json']);
        self::assertSame('Bearer secret-token', $http->requests[0]['options']['headers']['Authorization']);
    }

    public function testItSendsFormRequests(): void
    {
        $http = new FakeHttpClient(new Response(200, [], '{"ok":true}'));
        $client = new Client([
            'base_url' => 'https://panel.example.com',
            'token' => 'secret-token',
        ], $http);

        $response = $client->postForm('/api/237/media-service/update', ['maxuser' => 500]);

        self::assertSame(['ok' => true], $response);
        self::assertSame('POST', $http->requests[0]['method']);
        self::assertSame('api/237/media-service/update', $http->requests[0]['uri']);
        self::assertSame(['maxuser' => 500], $http->requests[0]['options']['form_params']);
    }

    public function testItSupportsApiKeyAuthentication(): void
    {
        $http = new FakeHttpClient(new Response(200, [], '{}'));
        $client = new Client([
            'base_url' => 'https://panel.example.com',
            'auth_type' => 'api_key',
            'api_key' => 'api-key',
            'api_key_header' => 'X-MEDIACP-KEY',
        ], $http);

        $client->get('system/status');

        self::assertSame('api-key', $http->requests[0]['options']['headers']['X-MEDIACP-KEY']);
        self::assertArrayNotHasKey('Authorization', $http->requests[0]['options']['headers']);
    }

    public function testItRequiresBaseUrl(): void
    {
        $this->expectException(ConfigurationException::class);
        $this->expectExceptionMessage('base_url');

        new Client([]);
    }

    public function testItThrowsApiExceptionForInvalidJson(): void
    {
        $http = new FakeHttpClient(new Response(200, [], 'not-json'));
        $client = new Client([
            'base_url' => 'https://panel.example.com',
        ], $http);

        $this->expectException(ApiException::class);
        $this->expectExceptionMessage('invalid JSON');

        $client->get('system/status');
    }

    public function testItConvertsApiErrorResponsesToApiExceptions(): void
    {
        $request = new Request('GET', 'services');
        $response = new Response(422, [], '{"message":"Validation failed","errors":{"name":["Required"]}}');
        $http = new FakeHttpClient(new RequestException('Request failed', $request, $response));
        $client = new Client([
            'base_url' => 'https://panel.example.com',
        ], $http);

        try {
            $client->get('services');
            self::fail('Expected API exception was not thrown.');
        } catch (ApiException $exception) {
            self::assertSame(422, $exception->statusCode());
            self::assertSame('Validation failed', $exception->getMessage());
            self::assertSame(['Required'], $exception->response()['errors']['name']);
        }
    }
}
