<?php

namespace spec\Http\Client\Exception;

use Http\Client\BatchResult;
use PhpSpec\ObjectBehavior;

class BatchExceptionSpec extends ObjectBehavior
{
    private $result;

    function let()
    {
        $this->beConstructedWith($this->result = new BatchResult());
    }

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
        $this->getResult()->shouldReturn($this->result);
    }
}
