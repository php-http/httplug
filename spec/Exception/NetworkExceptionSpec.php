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

    function it_is_a_transfer_exception()
    {
        $this->shouldHaveType('Http\Client\Exception\TransferException');
    }

    function it_implements_psr_network_exception_interface()
    {
        $this->shouldHaveType('Psr\Http\Client\NetworkExceptionInterface');
    }

    function it_does_not_implement_psr_request_exception_interface()
    {
        $this->shouldNotHaveType('Psr\Http\Client\RequestExceptionInterface');
    }

    function it_is_not_a_request_exception()
    {
        $this->shouldNotHaveType('Http\Client\Exception\RequestException');
    }

    function it_has_a_request(RequestInterface $request)
    {
        $this->getRequest()->shouldReturn($request);
    }
}
