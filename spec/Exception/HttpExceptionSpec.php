<?php

namespace spec\Http\Client\Exception;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use PhpSpec\ObjectBehavior;

class HttpExceptionSpec extends ObjectBehavior
{
    function let(RequestInterface $request, ResponseInterface $response)
    {
        $response->getStatusCode()->willReturn(400);

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

    function it_creates_a_client_exception(RequestInterface $request, ResponseInterface $response)
    {
        $request->getRequestTarget()->willReturn('/uri');
        $request->getMethod()->willReturn('GET');
        $response->getStatusCode()->willReturn(404);
        $response->getReasonPhrase()->willReturn('Not Found');

        $e = $this->create($request, $response);

        $e->shouldHaveType('Http\Client\Exception\ClientException');
        $e->getMessage()->shouldReturn('Client error [url] /uri [http method] GET [status code] 404 [reason phrase] Not Found');
    }

    function it_creates_a_server_exception(RequestInterface $request, ResponseInterface $response)
    {
        $request->getRequestTarget()->willReturn('/uri');
        $request->getMethod()->willReturn('GET');
        $response->getStatusCode()->willReturn(500);
        $response->getReasonPhrase()->willReturn('Internal Server Error');

        $e = $this->create($request, $response);

        $e->shouldHaveType('Http\Client\Exception\ServerException');
        $e->getMessage()->shouldReturn('Server error [url] /uri [http method] GET [status code] 500 [reason phrase] Internal Server Error');
    }

    function it_creates_an_http_exception(RequestInterface $request, ResponseInterface $response)
    {
        $request->getRequestTarget()->willReturn('/uri');
        $request->getMethod()->willReturn('GET');
        $response->getStatusCode()->willReturn(100);
        $response->getReasonPhrase()->willReturn('Continue');

        $e = $this->create($request, $response);

        $e->shouldHaveType('Http\Client\Exception\HttpException');
        $e->getMessage()->shouldReturn('Unsuccessful response [url] /uri [http method] GET [status code] 100 [reason phrase] Continue');
    }
}
