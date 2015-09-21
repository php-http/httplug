<?php

namespace spec\Http\Client;

use Http\Client\Exception;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use PhpSpec\ObjectBehavior;

class BatchResultSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Http\Client\BatchResult');
    }

    function it_is_immutable(RequestInterface $request, ResponseInterface $response, Exception $exception)
    {
        $new = $this->addResponse($request, $response);
        $new2 = $new->addException($request, $exception);

        $this->getResponses()->shouldReturn([]);
        $this->getExceptions()->shouldReturn([]);
        $new->shouldHaveType('Http\Client\BatchResult');
        $new->getResponses()->shouldReturn([$response]);
        $new->getExceptions()->shouldReturn([]);
        $new2->shouldHaveType('Http\Client\BatchResult');
        $new2->getResponses()->shouldReturn([$response]);
        $new2->getExceptions()->shouldReturn([$exception]);
    }

    function it_has_a_response_for_a_request(RequestInterface $request, ResponseInterface $response)
    {
        $new = $this->addResponse($request, $response);

        $this->getResponseFor($request)->shouldReturn(null);
        $this->hasResponses()->shouldReturn(false);
        $this->hasResponseFor($request)->shouldReturn(false);
        $this->getResponses()->shouldReturn([]);
        $this->isSuccessful($request)->shouldReturn(false);
        $this->isFailed($request)->shouldReturn(false);
        $new->getResponseFor($request)->shouldReturn($response);
        $new->hasResponses()->shouldReturn(true);
        $new->hasResponseFor($request)->shouldReturn(true);
        $new->getResponses()->shouldReturn([$response]);
        $new->isSuccessful($request)->shouldReturn(true);
        $new->isFailed($request)->shouldReturn(false);
    }

    function it_has_an_exception_for_a_request(RequestInterface $request, Exception $exception)
    {
        $new = $this->addException($request, $exception);

        $this->getExceptionFor($request)->shouldReturn(null);
        $this->hasExceptions()->shouldReturn(false);
        $this->hasExceptionFor($request)->shouldReturn(false);
        $this->getExceptions()->shouldReturn([]);
        $this->isSuccessful($request)->shouldReturn(false);
        $this->isFailed($request)->shouldReturn(false);
        $new->getExceptionFor($request)->shouldReturn($exception);
        $new->hasExceptions()->shouldReturn(true);
        $new->hasExceptionFor($request)->shouldReturn(true);
        $new->getExceptions()->shouldReturn([$exception]);
        $new->isSuccessful($request)->shouldReturn(false);
        $new->isFailed($request)->shouldReturn(true);
    }
}
