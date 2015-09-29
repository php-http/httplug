<?php

namespace Http\Client;

use Http\Client\Exception;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Responses and exceptions returned from parallel request execution
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
     */
    public function addResponse(RequestInterface $request, ResponseInterface $response);

    /**
     * Checks if a request is successful
     *
     * @param RequestInterface $request
     *
     * @return boolean
     */
    public function isSuccessful(RequestInterface $request);

    /**
     * Checks if a request is failed
     *
     * @param RequestInterface $request
     *
     * @return boolean
     */
    public function isFailed(RequestInterface $request);

    /**
     * Returns all exceptions
     *
     * @return Exception[]
     */
    public function getExceptions();

    /**
     * Returns an exception for a request
     *
     * @param RequestInterface $request
     *
     * @return Exception
     *
     * @throws \UnexpectedValueException If request is not found
     */
    public function getExceptionFor(RequestInterface $request);

    /**
     * Checks if there is an exception for a request
     *
     * @param RequestInterface $request
     *
     * @return boolean
     */
    public function hasExceptionFor(RequestInterface $request);

    /**
     * Adds an exception
     *
     * @param RequestInterface  $request
     * @param Exception         $exception
     *
     * @return BatchResult
     */
    public function addException(RequestInterface $request, Exception $exception);
}
