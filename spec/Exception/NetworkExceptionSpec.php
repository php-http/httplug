<?php

namespace spec\Http\Client\Exception;

use Psr\Http\Message\RequestInterface;
use PhpSpec\ObjectBehavior;

class NetworkExceptionSpec extends ObjectBehavior
{
    function let(RequestInterface $request)
    {
        $this->beConstructedWith('message', $request);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Http\Client\Exception\NetworkException');
    }

    function it_is_a_request_exception()
    {
        $this->shouldHaveType('Http\Client\Exception\RequestException');
    }
}
