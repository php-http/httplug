<?php

namespace Http\Client\Tests\Promise;

use Http\Client\Exception;
use Http\Client\Exception\TransferException;
use Http\Client\Promise\HttpFulfilledPromise;
use Http\Client\Promise\HttpRejectedPromise;
use Http\Client\Tests\CreatesStubs;
use Http\Promise\Promise;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

final class HttpRejectedPromiseTest extends TestCase
{
    use CreatesStubs;

    /**
     * @var TransferException
     */
    private $exception;

    /**
     * @var HttpRejectedPromise
     */
    private $promise;

    protected function setUp(): void
    {
        $this->exception = new TransferException();
        $this->promise = new HttpRejectedPromise($this->exception);
    }

    public function testIsAPromise(): void
    {
        $this->assertInstanceOf(Promise::class, $this->promise);
    }

    public function testIsInRejectedState(): void
    {
        $this->assertSame(Promise::REJECTED, $this->promise->getState());
    }

    public function testThrowsTheExceptionWhenWaiting(): void
    {
        try {
            $this->promise->wait();
            $this->fail('Expected exception was not thrown.');
        } catch (TransferException $e) {
            $this->assertSame($this->exception, $e);
        }
    }

    public function testDoesNotUnwrapTheException(): void
    {
        $this->assertNull($this->promise->wait(false));
    }

    public function testReturnsItselfWhenNoOnRejectedCallbackIsPassed(): void
    {
        $this->assertSame($this->promise, $this->promise->then());
        $this->assertSame($this->promise, $this->promise->then(function () {
            $this->fail('The onFulfilled callback must not be called.');
        }));
    }

    public function testReturnsAFulfilledPromiseWithTheCallbackResult(): void
    {
        $response = $this->stub(ResponseInterface::class);
        $received = null;

        $promise = $this->promise->then(null, function (Exception $exception) use (&$received, $response) {
            $received = $exception;

            return $response;
        });

        $this->assertSame($this->exception, $received);
        $this->assertInstanceOf(HttpFulfilledPromise::class, $promise);
        $this->assertSame(Promise::FULFILLED, $promise->getState());
        $this->assertSame($response, $promise->wait());
    }

    public function testReturnsThePromiseReturnedByTheCallback(): void
    {
        $returnedPromise = new HttpFulfilledPromise($this->stub(ResponseInterface::class));

        $promise = $this->promise->then(null, function () use ($returnedPromise) {
            return $returnedPromise;
        });

        $this->assertSame($returnedPromise, $promise);
    }

    public function testReturnsARejectedPromiseWhenTheCallbackThrowsAnHttplugException(): void
    {
        $exception = new TransferException();

        $promise = $this->promise->then(null, function () use ($exception) {
            throw $exception;
        });

        $this->assertInstanceOf(HttpRejectedPromise::class, $promise);
        $this->assertNotSame($this->promise, $promise);
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

        $this->promise->then(null, function () {
            throw new \LogicException();
        });
    }
}
