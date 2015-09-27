<?php

namespace spec\Http\Client\Body;

use PhpSpec\ObjectBehavior;

class MultipartDataSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(['data' => 1], 'boundary');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Http\Client\Body\MultipartData');
    }

    function it_is_body()
    {
        $this->shouldImplement('Http\Client\Body');
    }

    function it_is_multipart()
    {
        $this->shouldHaveType('Http\Client\Body\Multipart');
    }

    function it_has_content_header()
    {
        $this->getContentHeaders()->shouldReturn(['Content-Type' => 'multipart/form-data; boundary=boundary']);
    }

    function it_is_streamable()
    {
        $body = "--boundary\r\nContent-Disposition: form-data; name=\"data\"\r\n\r\n1\r\n";

        $this->toStreamable()->shouldReturn($body);
    }
}
