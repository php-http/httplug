<?php

namespace spec\Http\Client\Exception;

use Http\Client\Exception\TransferException;
use Psr\Http\Message\ResponseInterface;
use PhpSpec\ObjectBehavior;

class BatchExceptionSpec extends ObjectBehavior
{
    function let(TransferException $e, ResponseInterface $response)
    {
        $this->beConstructedWith([$e], [$response]);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Http\Client\Exception\BatchException');
    }

    function it_is_a_transfer_exception()
    {
        $this->shouldHaveType('Http\Client\Exception\TransferException');
    }

    function it_has_exceptions(TransferException $e, TransferException $e2)
    {
        $this->getExceptions()->shouldReturn([$e]);
        $this->hasException($e)->shouldReturn(true);
        $this->hasException($e2)->shouldReturn(false);
        $this->hasExceptions()->shouldReturn(true);
    }

    function it_has_responses(ResponseInterface $response, ResponseInterface $response2)
    {
        $this->getResponses()->shouldReturn([$response]);
        $this->hasResponse($response)->shouldReturn(true);
        $this->hasResponse($response2)->shouldReturn(false);
        $this->hasResponses()->shouldReturn(true);
    }
}
