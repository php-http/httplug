<?php

namespace spec\Http\Client\Exception;

use PhpSpec\ObjectBehavior;
use Psr\Http\Message\RequestInterface;

class NetworkExceptionSpec extends ObjectBehavior
{
    public function let(RequestInterface $request)
    {
        $this->beConstructedWith('message', $request);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('Http\Client\Exception\NetworkException');
    }

    public function it_is_a_request_exception()
    {
        $this->shouldHaveType('Http\Client\Exception\RequestException');
    }
}
