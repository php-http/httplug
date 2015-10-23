<?php

namespace spec\Http\Client\Exception;

use Http\Client\Exception\TransferException;
use PhpSpec\ObjectBehavior;

class TransferExceptionSpec extends ObjectBehavior
{
    function let()
    {
        $this->beAnInstanceOf('spec\Http\Client\Exception\TransferExceptionStub');
    }

    function it_is_a_runtime_exception()
    {
        $this->shouldHaveType('RuntimeException');
    }

    function it_is_an_exception()
    {
        $this->shouldImplement('Http\Client\Exception');
    }
}

class TransferExceptionStub extends TransferException
{
}
