<?php

namespace Http\Client\Exception;

use Http\Client\Exception;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * @author GeLo <geloen.eric@gmail.com>
 */
class HttpClientException extends \RuntimeException implements Exception
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
}
