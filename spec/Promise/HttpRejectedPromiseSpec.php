<?php

namespace spec\Http\Client\Promise;

use Http\Client\Exception;
use Http\Client\Exception\TransferException;
use Http\Promise\Promise;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Psr\Http\Message\ResponseInterface;

class HttpRejectedPromiseSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(new TransferException());
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Http\Client\Promise\HttpRejectedPromise');
    }

    function it_is_a_promise()
    {
        $this->shouldImplement('Http\Promise\Promise');
    }

    function it_returns_a_fulfilled_promise(ResponseInterface $response)
    {
        $exception = new TransferException();
        $this->beConstructedWith($exception);

        $promise = $this->then(null, function (Exception $exceptionReceived) use($exception, $response) {
            return $response->getWrappedObject();
        });

        $promise->shouldHaveType('Http\Promise\Promise');
        $promise->shouldHaveType('Http\Client\Promise\HttpFulfilledPromise');
        $promise->getState()->shouldReturn(Promise::FULFILLED);
        $promise->wait()->shouldReturnAnInstanceOf('Psr\Http\Message\ResponseInterface');
    }

    function it_returns_a_rejected_promise()
    {
        $exception = new TransferException();
        $this->beConstructedWith($exception);

        $promise = $this->then(null, function (Exception $exceptionReceived) use($exception) {
            if (Argument::is($exceptionReceived)->scoreArgument($exception)) {
                throw $exception;
            }
        });

        $promise->shouldHaveType('Http\Promise\Promise');
        $promise->shouldHaveType('Http\Client\Promise\HttpRejectedPromise');
        $promise->getState()->shouldReturn(Promise::REJECTED);
        $promise->shouldThrow($exception)->duringWait();
    }

    function it_returns_itself_when_no_on_rejected_callback_is_passed()
    {
        $this->then()->shouldReturn($this);
    }

    function it_is_in_rejected_state()
    {
        $this->getState()->shouldReturn(Promise::REJECTED);
    }

    function it_returns_an_exception()
    {
        $exception = new TransferException();

        $this->beConstructedWith($exception);
        $this->shouldThrow($exception)->duringWait();
    }

    function it_does_not_unwrap_a_value()
    {
        $this->shouldNotThrow('Http\Client\Exception')->duringWait(false);
    }

    function it_throws_not_http_exception()
    {
        $this->shouldThrow('Exception')->duringThen(null, function () {
            throw new \Exception();
        });
    }
}
