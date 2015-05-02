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
use Psr\Http\Message\StreamInterface;

/**
 * @author GeLo <geloen.eric@gmail.com>
 */
interface MessageFactoryInterface
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
     * @param string|UriInterface                  $uri
     * @param string                               $method
     * @param string                               $protocolVersion
     * @param string[]                             $headers
     * @param resource|string|StreamInterface|null $body
     * @param array                                $parameters
     *
     * @return RequestInterface
     */
    public function createRequest(
        $uri,
        $method = RequestInterface::METHOD_GET,
        $protocolVersion = RequestInterface::PROTOCOL_VERSION_1_1,
        array $headers = [],
        $body = null,
        array $parameters = []
    );

    /**
     * Creates an internal request
     *
     * @param string|UriInterface $uri
     * @param string              $method
     * @param string              $protocolVersion
     * @param string[]            $headers
     * @param array|string        $data
     * @param array               $files
     * @param array               $parameters
     *
     * @return InternalRequestInterface
     */
    public function createInternalRequest(
        $uri,
        $method = RequestInterface::METHOD_GET,
        $protocolVersion = RequestInterface::PROTOCOL_VERSION_1_1,
        array $headers = [],
        $data = [],
        array $files = [],
        array $parameters = []
    );

    /**
     * Creates a response.
     *
     * @param integer                              $statusCode
     * @param string                               $protocolVersion
     * @param string[]                             $headers
     * @param resource|string|StreamInterface|null $body
     * @param array                                $parameters
     *
     * @return ResponseInterface
     */
    public function createResponse(
        $statusCode = 200,
        $protocolVersion = RequestInterface::PROTOCOL_VERSION_1_1,
        array $headers = [],
        $body = null,
        array $parameters = []
    );
}
