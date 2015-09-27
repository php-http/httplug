<?php

namespace Http\Client;

use Psr\Http\Message\StreamInterface;

/**
 * Allows special input as body
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
interface Body
{
    /**
     * Returns a set of headers which is needed to correctly send the body
     *
     * Note: these headers get overwritten by headers manually passed to the client
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
