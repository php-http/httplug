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

    function it_is_a_runtime_exception()
    {
        $this->shouldHaveType('RuntimeException');
    }

    function it_is_an_exception()
    {
        $this->shouldImplement('Http\Client\Exception');
    }

    function it_has_a_result()
    {
        $this->setResult($result = new BatchResult());
        $this->getResult()->shouldReturn($result);
    }

    function it_throws_an_exception_if_the_result_is_already_set()
    {
        $this->getResult()->shouldHaveType('Http\Client\BatchResult');
        $this->shouldThrow('Http\Client\Exception\InvalidArgumentException')->duringSetResult(new BatchResult());
    }

    function it_has_an_exception_for_a_request(RequestInterface $request, Exception $exception)
    {
        $this->shouldThrow('Http\Client\Exception\UnexpectedValueException')->duringGetExceptionFor($request);
        $this->hasExceptionFor($request)->shouldReturn(false);

        $this->addException($request, $exception);

        $this->getExceptionFor($request)->shouldReturn($exception);
        $this->hasExceptionFor($request)->shouldReturn(true);
    }

    function it_has_exceptions(RequestInterface $request, Exception $exception)
    {
        $this->getExceptions()->shouldReturn([]);

        $this->addException($request, $exception);

        $this->getExceptions()->shouldReturn([$exception]);
    }

    function it_checks_if_a_request_failed(RequestInterface $request, Exception $exception)
    {
        $this->isSuccessful($request)->shouldReturn(false);
        $this->isFailed($request)->shouldReturn(false);

        $this->addException($request, $exception);

        $this->isSuccessful($request)->shouldReturn(false);
        $this->isFailed($request)->shouldReturn(true);
    }
}
