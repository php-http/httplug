<?php

namespace spec\Http\Client\Body;

use PhpSpec\ObjectBehavior;

class FilesSpec extends ObjectBehavior
{
    protected $file;

    function let()
    {
        $this->file = tempnam(sys_get_temp_dir(), 'multipart');

        $this->beConstructedWith(['file' => $this->file], 'boundary');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Http\Client\Body\Files');
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
        $body = sprintf("--boundary\r\nContent-Disposition: form-data; name=\"file\"; filename=\"%s\"\r\n\r\n\r\n", basename($this->file));

        $this->toStreamable()->shouldReturn($body);
    }
}
