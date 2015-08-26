<?php

namespace spec\Http\Client\Body;

use PhpSpec\ObjectBehavior;

class UrlencodedDataSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(['data1' => 1, 'data2' => 2]);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Http\Client\Body\UrlencodedData');
    }

    function it_is_body()
    {
        $this->shouldImplement('Http\Client\Body');
    }

    function it_has_content_header()
    {
        $this->getContentHeaders()->shouldReturn(['Content-Type' => 'application/x-www-form-urlencoded']);
    }

    function it_is_streamable()
    {
        $this->toStreamable()->shouldReturn('data1=1&data2=2');
    }
}
