<?php

namespace Http\Client\Tests\Promise;

use Http\Client\Exception\TransferException;
use Http\Client\Promise\HttpFulfilledPromise;
use Http\Client\Promise\HttpRejectedPromise;
use Http\Client\Tests\CreatesStubs;
use Http\Promise\Promise;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

final class HttpFulfilledPromiseTest extends TestCase
{
    use CreatesStubs;

    /**
     * @var ResponseInterface
     */
    private $response;

    /**
     * @var HttpFulfilledPromise
     */
    private $promise;

    protected function setUp(): void
    {
        $this->response = $this->stub(ResponseInterface::class);
        $this->promise = new HttpFulfilledPromise($this->response);
    }

    public function testIsAPromise(): void
    {
        $this->assertInstanceOf(Promise::class, $this->promise);
    }

    public function testIsInFulfilledState(): void
    {
        $this->assertSame(Promise::FULFILLED, $this->promise->getState());
    }

    public function testReturnsTheResponseWhenWaiting(): void
    {
        $this->assertSame($this->response, $this->promise->wait());
    }

    public function testDoesNotUnwrapTheResponse(): void
    {
        $this->assertNull($this->promise->wait(false));
    }

    public function testReturnsItselfWhenNoOnFulfilledCallbackIsPassed(): void
    {
        $this->assertSame($this->promise, $this->promise->then());
        $this->assertSame($this->promise, $this->promise->then(null, function () {
            $this->fail('The onRejected callback must not be called.');
        }));
    }

    public function testReturnsAFulfilledPromiseWithTheCallbackResult(): void
    {
        $newResponse = $this->stub(ResponseInterface::class);
        $received = null;

        $promise = $this->promise->then(function (ResponseInterface $response) use (&$received, $newResponse) {
            $received = $response;

            return $newResponse;
        });

        $this->assertSame($this->response, $received);
        $this->assertInstanceOf(HttpFulfilledPromise::class, $promise);
        $this->assertSame(Promise::FULFILLED, $promise->getState());
        $this->assertSame($newResponse, $promise->wait());
    }

    public function testReturnsARejectedPromiseWhenTheCallbackThrowsAnHttplugException(): void
    {
        $exception = new TransferException();

        $promise = $this->promise->then(function () use ($exception) {
            throw $exception;
        });

        $this->assertInstanceOf(HttpRejectedPromise::class, $promise);
        $this->assertSame(Promise::REJECTED, $promise->getState());

        try {
            $promise->wait();
            $this->fail('Expected exception was not thrown.');
        } catch (TransferException $e) {
            $this->assertSame($exception, $e);
        }
    }

    public function testRethrowsExceptionsThatAreNotHttplugExceptions(): void
    {
        $this->expectException(\LogicException::class);

        $this->promise->then(function () {
            throw new \LogicException();
        });
    }
}
