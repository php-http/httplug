<?php

namespace spec\Http\Client\Exception;

use PhpSpec\ObjectBehavior;

class TransferExceptionSpec extends ObjectBehavior
{
    function it_is_a_runtime_exception()
    {
        $this->shouldHaveType('RuntimeException');
    }

    function it_is_an_exception()
    {
        $this->shouldImplement('Http\Client\Exception');
    }
}
