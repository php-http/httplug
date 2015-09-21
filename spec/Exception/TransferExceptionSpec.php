<?php

namespace spec\Http\Client\Exception;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TransferExceptionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Http\Client\Exception\TransferException');
    }
}
