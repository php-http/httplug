<?php

namespace spec\Http\Client\Exception;

use Http\Client\BatchResult;
use Http\Client\Exception;
use Psr\Http\Message\RequestInterface;
use PhpSpec\ObjectBehavior;

class BatchExceptionSpec extends ObjectBehavior
{
    function let(BatchResult $batchResult)
    {
        $this->beConstructedWith($batchResult);
    }

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

    function it_has_a_batch_result()
    {
        $this->getResult()->shouldHaveType('Http\Client\BatchResult');
    }
}
