<?php

namespace Http\Client\Body;

use Http\Client\Body;

/**
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class UrlencodedData implements Body
{
    /**
     * @var array
     */
    protected $data;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * {@inheritdoc}
     */
    public function getContentHeaders()
    {
        return [
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function toStreamable()
    {
        return http_build_query($this->data, null, '&');
    }
}
