<?php

namespace spec\Http\Client\Exception;

use Http\Client\BatchResult;
use Http\Client\Exception;
use Psr\Http\Message\RequestInterface;
use PhpSpec\ObjectBehavior;

class BatchExceptionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Http\Client\Exception\BatchException');
    }

    function it_is_an_exception()
    {
        $this->shouldImplement('Http\Client\Exception');
        $this->shouldHaveType('Exception');
    }

    function it_has_a_result()
    {
        $this->getResult()->shouldReturn(null);
        $this->setResult($result = new BatchResult());
        $this->getResult()->shouldReturn($result);
    }

    function it_has_an_exception_for_a_request(RequestInterface $request, Exception $exception)
    {
        $this->getExceptionFor($request)->shouldReturn(null);
        $this->hasExceptions()->shouldReturn(false);
        $this->hasExceptionFor($request)->shouldReturn(false);
        $this->getExceptions()->shouldReturn([]);
        $this->isSuccessful($request)->shouldReturn(false);
        $this->isFailed($request)->shouldReturn(false);

        $this->addException($request, $exception);

        $this->getExceptionFor($request)->shouldReturn($exception);
        $this->hasExceptions()->shouldReturn(true);
        $this->hasExceptionFor($request)->shouldReturn(true);
        $this->getExceptions()->shouldReturn([$exception]);
        $this->isSuccessful($request)->shouldReturn(false);
        $this->isFailed($request)->shouldReturn(true);
    }
}
