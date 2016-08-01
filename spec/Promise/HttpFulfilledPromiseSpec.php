<?php

namespace spec\Http\Client\Promise;

use Http\Client\Exception\TransferException;
use Http\Promise\Promise;
use PhpSpec\ObjectBehavior;
use Psr\Http\Message\ResponseInterface;

class HttpFulfilledPromiseSpec extends ObjectBehavior
{
    function let(ResponseInterface $response)
    {
        $this->beConstructedWith($response);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Http\Client\Promise\HttpFulfilledPromise');
    }

    function it_is_a_promise()
    {
        $this->shouldImplement('Http\Promise\Promise');
    }

    function it_returns_a_http_fulfilled_promise()
    {
        $promise = $this->then(function ($result) {
            return $result;
        });
        $promise->shouldHaveType('Http\Promise\Promise');
        $promise->shouldHaveType('Http\Client\Promise\HttpFulfilledPromise');
        $promise->getState()->shouldReturn(Promise::FULFILLED);
        $promise->wait()->shouldReturnAnInstanceOf('Psr\Http\Message\ResponseInterface');
    }

    function it_returns_a_http_rejected_promise()
    {
        $exception = new TransferException();
        $promise = $this->then(function () use ($exception) {
            throw $exception;
        });
        $promise->shouldHaveType('Http\Promise\Promise');
        $promise->shouldHaveType('Http\Client\Promise\HttpRejectedPromise');
        $promise->getState()->shouldReturn(Promise::REJECTED);
        $promise->shouldThrow($exception)->duringWait();
    }

    function it_returns_itself_when_no_on_fulfilled_callback_is_passed()
    {
        $this->then()->shouldReturn($this);
    }

    function it_is_in_fulfilled_state()
    {
        $this->getState()->shouldReturn(Promise::FULFILLED);
    }

    function it_has_a_response()
    {
        $this->wait()->shouldReturnAnInstanceOf('Psr\Http\Message\ResponseInterface');
    }

    function it_does_not_unwrap_a_response()
    {
        $this->wait(false)->shouldNotReturnAnInstanceOf('Psr\Http\Message\ResponseInterface');
    }

    function it_throws_not_http_exception()
    {
        $this->shouldThrow('Exception')->duringThen(function () {
            throw new \Exception();
        }, null);
    }
}
