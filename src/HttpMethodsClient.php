<?php

namespace Http\Client;

use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Interface for HTTP conventional methods
 *
 * Use this interface when you do not have PSR-7 RequestInterface instances available.
 *
 * @author Márk Sági-Kazár mark.sagikazar@gmail.com>
 */
interface HttpMethodsClient
{
    /**
     * Sends a GET request
     *
     * @param string|UriInterface $uri
     * @param array               $headers
     *
     * @throws Exception
     *
     * @return ResponseInterface
     */
    public function get($uri, array $headers = []);

    /**
     * Sends an HEAD request
     *
     * @param string|UriInterface $uri
     * @param array               $headers
     *
     * @throws Exception
     *
     * @return ResponseInterface
     */
    public function head($uri, array $headers = []);

    /**
     * Sends a TRACE request
     *
     * @param string|UriInterface $uri
     * @param array               $headers
     *
     * @throws Exception
     *
     * @return ResponseInterface
     */
    public function trace($uri, array $headers = []);

    /**
     * Sends a POST request
     *
     * @param string|UriInterface              $uri
     * @param array                            $headers
     * @param string|Body|StreamInterface|null $body
     *
     * @throws Exception
     *
     * @return ResponseInterface
     */
    public function post($uri, array $headers = [], $body = null);

    /**
     * Sends a PUT request
     *
     * @param string|UriInterface              $uri
     * @param array                            $headers
     * @param string|Body|StreamInterface|null $body
     *
     * @throws Exception
     *
     * @return ResponseInterface
     */
    public function put($uri, array $headers = [], $body = null);

    /**
     * Sends a PATCH request
     *
     * @param string|UriInterface              $uri
     * @param array                            $headers
     * @param string|Body|StreamInterface|null $body
     *
     * @throws Exception
     *
     * @return ResponseInterface
     */
    public function patch($uri, array $headers = [], $body = null);

    /**
     * Sends a DELETE request
     *
     * @param string|UriInterface              $uri
     * @param array                            $headers
     * @param string|Body|StreamInterface|null $body
     *
     * @throws Exception
     *
     * @return ResponseInterface
     */
    public function delete($uri, array $headers = [], $body = null);

    /**
     * Sends an OPTIONS request
     *
     * @param string|UriInterface              $uri
     * @param array                            $headers
     * @param string|Body|StreamInterface|null $body
     *
     * @throws Exception
     *
     * @return ResponseInterface
     */
    public function options($uri, array $headers = [], $body = null);

    /**
     * Sends a request
     *
     * @param string                           $method
     * @param string|UriInterface              $uri
     * @param array                            $headers
     * @param string|Body|StreamInterface|null $body
     *
     * @throws Exception
     *
     * @return ResponseInterface
     */
    public function send($method, $uri, array $headers = [], $body = null);
}
