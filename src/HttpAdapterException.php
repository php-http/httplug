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

use Http\Adapter\Message\InternalRequest;
use Psr\Http\Message\ResponseInterface;

/**
 * @author GeLo <geloen.eric@gmail.com>
 */
class HttpAdapterException extends \Exception
{
    /**
     * @var InternalRequest|null
     */
    private $request;

    /**
     * @var ResponseInterface|null
     */
    private $response;

    /**
     * Returns the request
     *
     * @return InternalRequest|null
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
     * @param InternalRequest|null $request
     */
    public function setRequest(InternalRequest $request = null)
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
