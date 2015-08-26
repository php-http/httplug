<?php

namespace Http\Client\Body;

/**
 * Data and files converted to multipart form body
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class CombinedMultipart extends Multipart
{
    /**
     * @var MultipartData
     */
    protected $data;

    /**
     * @var Files
     */
    protected $files;

    /**
     * @param array       $data
     * @param array       $files
     * @param string|null $boundary
     */
    public function __construct(array $data, array $files, $boundary = null)
    {
        parent::__construct($boundary);

        $this->data = new MultipartData($data, $this->boundary);
        $this->files = new Files($files, $this->boundary);
    }

    /**
     * {@inheritdoc}
     */
    public function toStreamable()
    {
        $body = $this->data->toStreamable();
        $body .= $this->files->toStreamable();

        return $body;
    }
}
