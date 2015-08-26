<?php

namespace Http\Client\Body;

use Http\Client\Body;

/**
 * Plain text body
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class PlainText implements Body
{
    /**
     * @var string
     */
    protected $string;

    /**
     * @param string $string
     */
    public function __construct($string)
    {
        $this->string = $string;
    }

    /**
     * {@inheritdoc}
     */
    public function getContentHeaders()
    {
        return [
            'Content-Type' => 'text/plain',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function toStreamable()
    {
        return $this->string;
    }
}
