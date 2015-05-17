<?php

/*
 * This file is part of the Http Adapter package.
 *
 * (c) Eric GELOEN <geloen.eric@gmail.com>
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 */

namespace Http\Adapter\Message;

use Http\Adapter\HttpAdapterException;
use Psr\Http\Message\UriInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

/**
 * @author GeLo <geloen.eric@gmail.com>
 */
interface MessageFactory
{
    /**
     * Returns the base URI
     *
     * @return null|UriInterface
     */
    public function getBaseUri();

    /**
     * Checks if there is a base URI
     *
     * @return boolean
     */
    public function hasBaseUri();

    /**
     * Sets the base URI
     *
     * @param null|string|UriInterface $baseUri
     *
     * @throws \InvalidArgumentException If the base uri is invalid.
     */
    public function setBaseUri($baseUri);

    /**
     * Creates a new request
     *
     * @param string                               $method
     * @param string|UriInterface                  $uri
     * @param string                               $protocolVersion
     * @param string[]                             $headers
     * @param resource|string|StreamInterface|null $body
     *
     * @return RequestInterface
     */
    public function createRequest(
        $method,
        $uri,
        $protocolVersion = '1.1',
        array $headers = [],
        $body = null
    );

    /**
     * Creates an internal request
     *
     * @param string              $method
     * @param string|UriInterface $uri
     * @param string              $protocolVersion
     * @param string[]            $headers
     * @param array|string        $data
     * @param array               $files
     * @param array               $parameters
     * @param array               $options
     *
     * @return InternalRequest
     */
    public function createInternalRequest(
        $method,
        $uri,
        $protocolVersion = '1.1',
        array $headers = [],
        $data = [],
        array $files = [],
        array $parameters = [],
        array $options = [],
    );

    /**
     * Creates a response
     *
     * @param integer                              $statusCode
     * @param string                               $protocolVersion
     * @param string[]                             $headers
     * @param resource|string|StreamInterface|null $body
     *
     * @return ResponseInterface
     */
    public function createResponse(
        $statusCode = 200,
        $protocolVersion = '1.1',
        array $headers = [],
        $body = null
    );
}
