<?php

namespace spec\Http\Client\Exception;

use PhpSpec\ObjectBehavior;

class UnexpectedValueExceptionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Http\Client\Exception\UnexpectedValueException');
    }

    function it_is_invalid_argument_exception()
    {
        $this->shouldHaveType('UnexpectedValueException');
    }

    function it_is_exception()
    {
        $this->shouldImplement('Http\Client\Exception');
    }
}
