<?php

namespace Http\Client\Tests\Exception;

use Http\Client\Exception\NetworkException;
use Http\Client\Exception\RequestException;
use Http\Client\Exception\TransferException;
use Http\Client\Tests\CreatesStubs;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\NetworkExceptionInterface;
use Psr\Http\Client\RequestExceptionInterface;
use Psr\Http\Message\RequestInterface;

final class NetworkExceptionTest extends TestCase
{
    use CreatesStubs;

    /**
     * @var RequestInterface
     */
    private $request;

    /**
     * @var NetworkException
     */
    private $exception;

    protected function setUp(): void
    {
        $this->request = $this->stub(RequestInterface::class);
        $this->exception = new NetworkException('message', $this->request);
    }

    public function testIsATransferException(): void
    {
        $this->assertInstanceOf(TransferException::class, $this->exception);
    }

    public function testImplementsPsrNetworkExceptionInterface(): void
    {
        $this->assertInstanceOf(NetworkExceptionInterface::class, $this->exception);
    }

    public function testDoesNotImplementPsrRequestExceptionInterface(): void
    {
        $this->assertNotInstanceOf(RequestExceptionInterface::class, $this->exception);
    }

    public function testIsNotARequestException(): void
    {
        $this->assertNotInstanceOf(RequestException::class, $this->exception);
    }

    public function testHasAMessage(): void
    {
        $this->assertSame('message', $this->exception->getMessage());
    }

    public function testHasARequest(): void
    {
        $this->assertSame($this->request, $this->exception->getRequest());
    }
}
