<?php

namespace spec\Http\Client\Exception;

use Http\Client\Exception\RequestException;
use Psr\Http\Message\RequestInterface;
use PhpSpec\ObjectBehavior;

class RequestExceptionSpec extends ObjectBehavior
{
    function let(RequestInterface $request)
    {
        $this->beConstructedWith('message', $request);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Http\Client\Exception\RequestException');
    }

    function it_has_a_request(RequestInterface $request)
    {
        $this->getRequest()->shouldReturn($request);
    }

    function it_wraps_an_exception(RequestInterface $request)
    {
        $e = new \Exception('message');

        $requestException = $this->wrapException($request, $e);

        $requestException->getMessage()->shouldReturn('message');
    }

    function it_does_not_wrap_if_request_exception(RequestInterface $request, RequestException $requestException)
    {
        $this->wrapException($request, $requestException)->shouldReturn($requestException);
    }
}
