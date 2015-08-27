<?php

namespace spec\Http\Client\Exception;

use PhpSpec\ObjectBehavior;

class InvalidArgumentExceptionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Http\Client\Exception\InvalidArgumentException');
    }

    function it_is_invalid_argument_exception()
    {
        $this->shouldHaveType('InvalidArgumentException');
    }

    function it_is_exception()
    {
        $this->shouldImplement('Http\Client\Exception');
    }
}
