<?php

namespace Http\Client;

use Http\Client\Exception;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Successful responses returned from parallel request execution
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
interface BatchResult
{
    /**
     * Returns all successful responses
     *
     * @return ResponseInterface[]
     */
    public function getResponses();

    /**
     * Returns a response of a request
     *
     * @param RequestInterface $request
     *
     * @return ResponseInterface
     *
     * @throws \UnexpectedValueException If request is not found
     */
    public function getResponseFor(RequestInterface $request);

    /**
     * Checks if there are any successful responses at all
     *
     * @return boolean
     */
    public function hasResponses();

    /**
     * Checks if there is a response of a request
     *
     * @param RequestInterface $request
     *
     * @return ResponseInterface
     */
    public function hasResponseFor(RequestInterface $request);

    /**
     * Adds a response in an immutable way
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     *
     * @return BatchResult
     *
     * @internal
     */
    public function addResponse(RequestInterface $request, ResponseInterface $response);
}
