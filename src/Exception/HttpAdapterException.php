<?php

/*
 * This file is part of the Http Adapter package.
 *
 * (c) Eric GELOEN <geloen.eric@gmail.com>
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 */

namespace Http\Adapter\Exception;

use Http\Adapter\Exception;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * @author GeLo <geloen.eric@gmail.com>
 */
class HttpAdapterException extends \Exception implements Exception
{
    /**
     * @var RequestInterface|null
     */
    private $request;

    /**
     * @var ResponseInterface|null
     */
    private $response;

    /**
     * Returns the request
     *
     * @return RequestInterface|null
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
     * @param RequestInterface|null $request
     */
    public function setRequest(RequestInterface $request = null)
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
     * @param string          $uri
     * @param string          $adapterName
     * @param \Exception|null $previous
     */
    public static function cannotFetchUri($uri, $adapterName, \Exception $previous = null)
    {
        $message = sprintf(
            'An error occurred when fetching the URI "%s" with the adapter "%s" ("%s").',
            $uri,
            $adapterName,
            isset($previous) ? $previous->getMessage() : ''
        );

        $code = isset($previous) ? $previous->getCode() : 0;

        return new self($message, $code, $previous);
    }
}
