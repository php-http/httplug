<?php

namespace Http\Client\Tests\Exception;

use Http\Client\Exception\HttpException;
use Http\Client\Exception\RequestException;
use Http\Client\Tests\CreatesStubs;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

final class HttpExceptionTest extends TestCase
{
    use CreatesStubs;

    public function testIsARequestException(): void
    {
        $exception = new HttpException('message', $this->stub(RequestInterface::class), $this->createResponse(500));

        $this->assertInstanceOf(RequestException::class, $exception);
    }

    public function testHasARequestAndAResponse(): void
    {
        $request = $this->stub(RequestInterface::class);
        $response = $this->createResponse(500);

        $exception = new HttpException('message', $request, $response);

        $this->assertSame('message', $exception->getMessage());
        $this->assertSame($request, $exception->getRequest());
        $this->assertSame($response, $exception->getResponse());
    }

    public function testUsesTheResponseStatusCodeAsCode(): void
    {
        $exception = new HttpException('message', $this->stub(RequestInterface::class), $this->createResponse(503));

        $this->assertSame(503, $exception->getCode());
    }

    public function testKeepsThePreviousException(): void
    {
        $previous = new \Exception();

        $exception = new HttpException('message', $this->stub(RequestInterface::class), $this->createResponse(500), $previous);

        $this->assertSame($previous, $exception->getPrevious());
    }

    public function testCreatesAnHttpExceptionWithANormalizedMessage(): void
    {
        $request = $this->stub(RequestInterface::class);
        $request->method('getRequestTarget')->willReturn('/uri');
        $request->method('getMethod')->willReturn('GET');
        $response = $this->createResponse(100, 'Continue');
        $previous = new \Exception();

        $exception = HttpException::create($request, $response, $previous);

        $this->assertInstanceOf(HttpException::class, $exception);
        $this->assertSame('[url] /uri [http method] GET [status code] 100 [reason phrase] Continue', $exception->getMessage());
        $this->assertSame(100, $exception->getCode());
        $this->assertSame($request, $exception->getRequest());
        $this->assertSame($response, $exception->getResponse());
        $this->assertSame($previous, $exception->getPrevious());
    }

    private function createResponse(int $statusCode, string $reasonPhrase = ''): ResponseInterface
    {
        $response = $this->stub(ResponseInterface::class);
        $response->method('getStatusCode')->willReturn($statusCode);
        $response->method('getReasonPhrase')->willReturn($reasonPhrase);

        return $response;
    }
}
