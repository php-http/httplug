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

use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * @author Márk Sági-Kazár mark.sagikazar@gmail.com>
 */
interface ConfigurableHttpAdapter extends HttpAdapter
{
    /**
     * Sends a GET request
     *
     * @param string|UriInterface $uri
     * @param string[]            $headers
     * @param array               $options
     *
     * @throws \InvalidArgumentException
     * @throws HttpAdapterException
     *
     * @return ResponseInterface
     */
    public function get($uri, array $headers = [], array $options = []);

    /**
     * Sends an HEAD request
     *
     * @param string|UriInterface $uri
     * @param string[]            $headers
     * @param array               $options
     *
     * @throws \InvalidArgumentException
     * @throws HttpAdapterException
     *
     * @return ResponseInterface
     */
    public function head($uri, array $headers = [], array $options = []);

    /**
     * Sends a TRACE request
     *
     * @param string|UriInterface $uri
     * @param string[]            $headers
     * @param array               $options
     *
     * @throws \InvalidArgumentException
     * @throws HttpAdapterException
     *
     * @return ResponseInterface
     */
    public function trace($uri, array $headers = [], array $options = []);

    /**
     * Sends a POST request
     *
     * @param string|UriInterface          $uri
     * @param string[]                     $headers
     * @param array|string|StreamInterface $data
     * @param array                        $files
     * @param array                        $options
     *
     * @throws \InvalidArgumentException
     * @throws HttpAdapterException
     *
     * @return ResponseInterface
     */
    public function post($uri, array $headers = [], $data = [], array $files = [], array $options = []);

    /**
     * Sends a PUT request
     *
     * @param string|UriInterface          $uri
     * @param string[]                     $headers
     * @param array|string|StreamInterface $data
     * @param array                        $files
     * @param array                        $options
     *
     * @throws \InvalidArgumentException
     * @throws HttpAdapterException
     *
     * @return ResponseInterface
     */
    public function put($uri, array $headers = [], $data = [], array $files = [], array $options = []);

    /**
     * Sends a PATCH request
     *
     * @param string|UriInterface          $uri
     * @param string[]                     $headers
     * @param array|string|StreamInterface $data
     * @param array                        $files
     * @param array                        $options
     *
     * @throws \InvalidArgumentException
     * @throws HttpAdapterException
     *
     * @return ResponseInterface
     */
    public function patch($uri, array $headers = [], $data = [], array $files = [], array $options = []);

    /**
     * Sends a DELETE request
     *
     * @param string|UriInterface          $uri
     * @param string[]                     $headers
     * @param array|string|StreamInterface $data
     * @param array                        $files
     * @param array                        $options
     *
     * @throws \InvalidArgumentException
     * @throws HttpAdapterException
     *
     * @return ResponseInterface
     */
    public function delete($uri, array $headers = [], $data = [], array $files = [], array $options = []);

    /**
     * Sends an OPTIONS request
     *
     * @param string|UriInterface          $uri
     * @param string[]                     $headers
     * @param array|string|StreamInterface $data
     * @param array                        $files
     * @param array                        $options
     *
     * @throws \InvalidArgumentException
     * @throws HttpAdapterException
     *
     * @return ResponseInterface
     */
    public function options($uri, array $headers = [], $data = [], array $files = [], array $options = []);

    /**
     * Sends a request
     *
     * @param string                       $method
     * @param string|UriInterface          $uri
     * @param string[]                     $headers
     * @param array|string|StreamInterface $data
     * @param array                        $files
     * @param array                        $options
     *
     * @throws \InvalidArgumentException
     * @throws HttpAdapterException
     *
     * @return ResponseInterface
     */
    public function send($method, $uri, array $headers = [], $data = [], array $files = [], array $options = []);
}
