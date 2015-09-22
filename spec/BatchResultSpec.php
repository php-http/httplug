<?php

namespace spec\Http\Client;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use PhpSpec\ObjectBehavior;

class BatchResultSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Http\Client\BatchResult');
    }

    function it_is_immutable(RequestInterface $request, ResponseInterface $response)
    {
        $new = $this->addResponse($request, $response);

        $this->getResponses()->shouldReturn([]);
        $new->shouldHaveType('Http\Client\BatchResult');
        $new->getResponses()->shouldReturn([$response]);
    }

    function it_has_a_response_for_a_request(RequestInterface $request, ResponseInterface $response)
    {
        $new = $this->addResponse($request, $response);

        $this->getResponseFor($request)->shouldReturn(null);
        $this->hasResponses()->shouldReturn(false);
        $this->hasResponseFor($request)->shouldReturn(false);
        $this->getResponses()->shouldReturn([]);
        $new->getResponseFor($request)->shouldReturn($response);
        $new->hasResponses()->shouldReturn(true);
        $new->hasResponseFor($request)->shouldReturn(true);
        $new->getResponses()->shouldReturn([$response]);
    }
}
