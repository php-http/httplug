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
interface HttpAdapterException extends Exception
{
    /**
     * Returns the request
     *
     * @return RequestInterface|null
     */
    public function getRequest();

    /**
     * Checks if there is a request
     *
     * @return boolean
     */
    public function hasRequest();

    /**
     * Sets the request
     *
     * @param RequestInterface|null $request
     */
    public function setRequest(RequestInterface $request = null);

    /**
     * Returns the response
     *
     * @return ResponseInterface|null
     */
    public function getResponse();

    /**
     * Checks if there is a response
     *
     * @return boolean
     */
    public function hasResponse();

    /**
     * Sets the response
     *
     * @param ResponseInterface|null $response
     */
    public function setResponse(ResponseInterface $response = null);
}
