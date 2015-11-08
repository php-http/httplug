<?php

namespace spec\Http\Client\Exception;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use PhpSpec\ObjectBehavior;

class HttpExceptionSpec extends ObjectBehavior
{
    function let(RequestInterface $request, ResponseInterface $response)
    {
        $this->beConstructedWith('message', $request, $response);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Http\Client\Exception\HttpException');
    }

    function it_is_a_request_exception()
    {
        $this->shouldHaveType('Http\Client\Exception\RequestException');
    }

    function it_has_a_response(ResponseInterface $response)
    {
        $this->getResponse()->shouldReturn($response);
    }

    function it_creates_an_http_exception(RequestInterface $request, ResponseInterface $response)
    {
        $request->getRequestTarget()->willReturn('/uri');
        $request->getMethod()->willReturn('GET');
        $response->getStatusCode()->willReturn(100);
        $response->getReasonPhrase()->willReturn('Continue');

        $e = $this->create($request, $response);

        $e->shouldHaveType('Http\Client\Exception\HttpException');
        $e->getMessage()->shouldReturn('[url] /uri [http method] GET [status code] 100 [reason phrase] Continue');
    }
}
