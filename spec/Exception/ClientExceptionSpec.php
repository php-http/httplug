<?php

namespace spec\Http\Client\Exception;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use PhpSpec\ObjectBehavior;

class ClientExceptionSpec extends ObjectBehavior
{
    function let(RequestInterface $request, ResponseInterface $response)
    {
        $response->getStatusCode()->willReturn(400);

        $this->beConstructedWith('message', $request, $response);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Http\Client\Exception\ClientException');
    }

    function it_is_an_http_exception()
    {
        $this->shouldHaveType('Http\Client\Exception\HttpException');
    }
}
