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

use Http\Adapter\Message\InternalRequestInterface;
use Http\Adapter\Message\ResponseInterface;

/**
 * @author GeLo <geloen.eric@gmail.com>
 */
class HttpAdapterException extends \Exception
{
    /**
     * @var InternalRequestInterface|null
     */
    private $request;

    /**
     * @var ResponseInterface|null
     */
    private $response;

    /**
     * Returns the request
     *
     * @return InternalRequestInterface|null
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Checks if there is a request
     *
     * @return boolean
     */
    public function hasRequest()
    {
        return isset($this->request);
    }

    /**
     * Sets the request
     *
     * @param InternalRequestInterface|null $request
     */
    public function setRequest(InternalRequestInterface $request = null)
    {
        $this->request = $request;
    }

    /**
     * Returns the response
     *
     * @return ResponseInterface|null
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Checks if there is a response
     *
     * @return boolean
     */
    public function hasResponse()
    {
        return isset($this->response);
    }

    /**
     * Sets the response
     *
     * @param ResponseInterface|null $response
     */
    public function setResponse(ResponseInterface $response = null)
    {
        $this->response = $response;
    }

    /**
     * Returns a "CANNOT FETCH URI" exception
     *
     * @param string $uri
     * @param string $adapter
     * @param string $error
     *
     * @return self
     */
    public static function cannotFetchUri($uri, $adapter, $error)
    {
        return new self(sprintf(
            'An error occurred when fetching the URI "%s" with the adapter "%s" ("%s").',
            $uri,
            $adapter,
            $error
        ));
    }

    /**
     * Returns a "CANNOT LOAD COOKIE JAR" exception
     *
     * @param string $error
     *
     * @return self
     */
    public static function cannotLoadCookieJar($error)
    {
        return new self(sprintf('An error occurred when loading the cookie jar ("%s").', $error));
    }

    /**
     * Returns a "CANNOT SAVE COOKIE JAR" exception
     *
     * @param string $error
     *
     * @return self
     */
    public static function cannotSaveCookieJar($error)
    {
        return new self(sprintf('An error occurred when saving the cookie jar ("%s").', $error));
    }

    /**
     * Returns a "HTTP ADAPTER DOES NOT EXIST" exception
     *
     * @param string $name
     *
     * @return self
     */
    public static function httpAdapterDoesNotExist($name)
    {
        return new self(sprintf('The http adapter "%s" does not exist.', $name));
    }

    /**
     * Returns a "HTTP ADAPTER IS NOT USABLE" exception
     *
     * @param string $name
     *
     * @return self
     */
    public static function httpAdapterIsNotUsable($name)
    {
        return new self(sprintf('The http adapter "%s" is not usable.', $name));
    }

    /**
     * Returns a "HTTP ADAPTERS ARE NOT USABLE" exception
     *
     * @return self
     */
    public static function httpAdaptersAreNotUsable()
    {
        return new self('No http adapters are usable.');
    }

    /**
     * Returns a "HTTP ADAPTER MUST IMPLEMENT INTERFACE" exception
     *
     * @param string $class
     *
     * @return self
     */
    public static function httpAdapterMustImplementInterface($class)
    {
        return new self(sprintf('The class "%s" must implement "Ivory\HttpAdapter\HttpAdapterInterface".', $class));
    }

    /**
     * Returns a "DOES NOT SUPPORT SUB ADAPTER" exception
     *
     * @param string $adapter
     * @param string $subAdapter
     *
     * @return self
     */
    public static function doesNotSupportSubAdapter($adapter, $subAdapter)
    {
        return new self(sprintf('The adapter "%s" does not support the sub-adapter "%s".', $adapter, $subAdapter));
    }

    /**
     * Returns a "EXTENSION IS NOT LOADED" exception
     *
     * @param string $extension
     * @param string $adapter
     *
     * @return self
     */
    public static function extensionIsNotLoaded($extension, $adapter)
    {
        return new self(sprintf('The adapter "%s" expects the PHP extension "%s" to be loaded.', $adapter, $extension));
    }

    /**
     * Returns a "MAX REDIRECTS EXCEEDED" exception
     *
     * @param string  $uri
     * @param integer $maxRedirects
     * @param string  $adapter
     *
     * @return self
     */
    public static function maxRedirectsExceeded($uri, $maxRedirects, $adapter)
    {
        return self::cannotFetchUri($uri, $adapter, sprintf('Max redirects exceeded (%d)', $maxRedirects));
    }

    /**
     * Returns a "REQUEST IS NOT VALID" exception
     *
     * @param mixed $request
     *
     * @return self
     */
    public static function requestIsNotValid($request)
    {
        return new self(sprintf(
            'The request must be a string, an array or implement "Psr\Http\Message\RequestInterface" ("%s" given).',
            is_object($request) ? get_class($request) : gettype($request)
        ));
    }

    /**
     * Returns a "STREAM IS NOT VALID" exception
     *
     * @param mixed  $stream
     * @param string $wrapper
     * @param string $expected
     *
     * @return self
     */
    public static function streamIsNotValid($stream, $wrapper, $expected)
    {
        return new self(sprintf(
            'The stream "%s" only accepts a "%s" (current: "%s").',
            $wrapper,
            $expected,
            is_object($stream) ? get_class($stream) : gettype($stream)
        ));
    }

    /**
     * Returns a "TIMEOUT EXCEEDED" exception
     *
     * @param string $uri
     * @param float  $timeout
     * @param string $adapter
     *
     * @return self
     */
    public static function timeoutExceeded($uri, $timeout, $adapter)
    {
        return self::cannotFetchUri($uri, $adapter, sprintf('Timeout exceeded (%.2f)', $timeout));
    }
}
