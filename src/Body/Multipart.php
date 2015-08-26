<?php

namespace Http\Client\Body;

use Http\Client\Body;

/**
 * Basic multipart body
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
abstract class Multipart implements Body
{
    /**
     * @var string
     */
    protected $boundary;

    /**
     * @param string|null $boundary
     */
    public function __construct($boundary = null)
    {
        if (is_null($boundary)) {
            $boundary = sha1(microtime());
        }

        $this->boundary = $boundary;
    }

    /**
     * {@inheritdoc}
     */
    public function getContentHeaders()
    {
        return [
            'Content-Type' => 'multipart/form-data; boundary='.$this->boundary,
        ];
    }
}
