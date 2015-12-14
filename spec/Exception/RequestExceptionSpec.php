<?php

namespace spec\Http\Client\Exception;

use PhpSpec\ObjectBehavior;
use Psr\Http\Message\RequestInterface;

class RequestExceptionSpec extends ObjectBehavior
{
    public function let(RequestInterface $request)
    {
        $this->beConstructedWith('message', $request);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('Http\Client\Exception\RequestException');
    }

    public function it_is_a_transfer_exception()
    {
        $this->shouldHaveType('Http\Client\Exception\TransferException');
    }

    public function it_has_a_request(RequestInterface $request)
    {
        $this->getRequest()->shouldReturn($request);
    }
}
