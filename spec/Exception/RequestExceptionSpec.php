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

    function it_is_a_transfer_exception()
    {
        $this->shouldHaveType('Http\Client\Exception\TransferException');
    }

    function it_has_a_request(RequestInterface $request)
    {
        $this->getRequest()->shouldReturn($request);
    }
}
