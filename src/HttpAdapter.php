<?php

/*
 * This file is part of the Http Adapter package.
 *
 * (c) Eric GELOEN <geloen.eric@gmail.com>
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 */

namespace Http\Adapter;

use Psr\Http\Message\UriInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * @author GeLo <geloen.eric@gmail.com>
 */
interface HttpAdapter extends PsrHttpAdapter
{
    /**
     * Sends a GET request
     *
     * @param string|UriInterface $uri
     * @param string[]            $headers
     *
     * @throws HttpAdapterException If an error occurred.
     *
     * @return ResponseInterface
     */
    public function get($uri, array $headers = []);

    /**
     * Sends an HEAD request
     *
     * @param string|UriInterface $uri
     * @param string[]            $headers
     *
     * @throws HttpAdapterException If an error occurred.
     *
     * @return ResponseInterface
     */
    public function head($uri, array $headers = []);

    /**
     * Sends a TRACE request
     *
     * @param string|UriInterface $uri
     * @param string[]            $headers
     *
     * @throws HttpAdapterException If an error occurred.
     *
     * @return ResponseInterface
     */
    public function trace($uri, array $headers = []);

    /**
     * Sends a POST request
     *
     * @param string|UriInterface $uri
     * @param string[]            $headers
     * @param array|string        $data
     * @param array               $files
     *
     * @throws HttpAdapterException If an error occurred.
     *
     * @return ResponseInterface
     */
    public function post($uri, array $headers = [], $data = [], array $files = []);

    /**
     * Sends a PUT request
     *
     * @param string|UriInterface $uri
     * @param string[]            $headers
     * @param array|string        $data
     * @param array               $files
     *
     * @throws HttpAdapterException If an error occurred.
     *
     * @return ResponseInterface
     */
    public function put($uri, array $headers = [], $data = [], array $files = []);

    /**
     * Sends a PATCH request
     *
     * @param string|UriInterface $uri
     * @param string[]            $headers
     * @param array|string        $data
     * @param array               $files
     *
     * @throws HttpAdapterException If an error occurred.
     *
     * @return ResponseInterface
     */
    public function patch($uri, array $headers = [], $data = [], array $files = []);

    /**
     * Sends a DELETE request
     *
     * @param string|UriInterface $uri
     * @param string[]            $headers
     * @param array|string        $data
     * @param array               $files
     *
     * @throws HttpAdapterException If an error occurred.
     *
     * @return ResponseInterface
     */
    public function delete($uri, array $headers = [], $data = [], array $files = []);

    /**
     * Sends an OPTIONS request
     *
     * @param string|UriInterface $uri
     * @param string[]            $headers
     * @param array|string        $data
     * @param array               $files
     *
     * @throws HttpAdapterException If an error occurred.
     *
     * @return ResponseInterface
     */
    public function options($uri, array $headers = [], $data = [], array $files = []);

    /**
     * Sends a request
     *
     * @param string              $method
     * @param string|UriInterface $uri
     * @param string[]            $headers
     * @param array|string        $data
     * @param array               $files
     *
     * @throws HttpAdapterException If an error occurred.
     *
     * @return ResponseInterface
     */
    public function send($method, $uri, array $headers = [], $data = [], array $files = []);
}
