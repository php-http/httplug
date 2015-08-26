<?php

namespace Http\Client;

use Psr\Http\Message\StreamInterface;

/**
 * Allows a more input types for body data
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
interface Body
{
    /**
     * Returns a set of headers which is needed to correctly send the body
     *
     * Note: these headers SHOULD be overwritten if any matching header is passed manually
     *
     * Content-Length is calculated automatically if possible
     *
     * @return array
     */
    public function getContentHeaders();

    /**
     * Convert data to a format which can be used to create a proper PSR-7 Stream
     *
     * @return string|StreamInterface
     *
     * @throws Exception
     */
    public function toStreamable();
}
