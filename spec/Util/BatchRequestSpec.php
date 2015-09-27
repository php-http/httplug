<?php

namespace spec\Http\Client\Util;

use Http\Client\HttpPsrClient;
use Http\Client\Util\BatchRequest;
use PhpSpec\ObjectBehavior;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class BatchRequestSpec extends ObjectBehavior
{
    function let(HttpPsrClient $client)
    {
        $this->beAnInstanceOf('spec\Http\Client\Util\BatchRequestStub', [$client]);
    }

    function it_send_multiple_request_using_send_request(HttpPsrClient $client, RequestInterface $request1, RequestInterface $request2, ResponseInterface $response1, ResponseInterface $response2)
    {
        $client->sendRequest($request1, [])->willReturn($response1);
        $client->sendRequest($request2, [])->willReturn($response2);

        $this->sendRequests([$request1, $request2], [])->shouldReturnAnInstanceOf('\Http\Client\BatchResult');
    }

    function it_throw_batch_exception_if_one_or_more_request_failed(HttpPsrClient $client, RequestInterface $request1, RequestInterface $request2, ResponseInterface $response)
    {
        $client->sendRequest($request1, [])->willReturn($response);
        $client->sendRequest($request2, [])->willThrow('\Http\Client\Exception\HttpException');

        $this->shouldThrow('\Http\Client\Exception\BatchException')->duringSendRequests([$request1, $request2], []);
    }
}

class BatchRequestStub implements HttpPsrClient
{
    use BatchRequest;

    protected $client;

    public function __construct(HttpPsrClient $client)
    {
        $this->client = $client;
    }

    /**
     * {@inheritdoc}
     */
    public function sendRequest(RequestInterface $request, array $options = [])
    {
        return $this->client->sendRequest($request, $options);
    }
}
