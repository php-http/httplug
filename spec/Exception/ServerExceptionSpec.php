<?php

namespace spec\Http\Client\Exception;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use PhpSpec\ObjectBehavior;

class ServerExceptionSpec extends ObjectBehavior
{
    function let(RequestInterface $request, ResponseInterface $response)
    {
        $response->getStatusCode()->willReturn(500);

        $this->beConstructedWith('message', $request, $response);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Http\Client\Exception\ServerException');
    }

    function it_is_an_http_exception()
    {
        $this->shouldHaveType('Http\Client\Exception\HttpException');
    }
}
