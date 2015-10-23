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
     * Checks if there are any successful responses at all.
     *
     * @return boolean
     */
    public function hasResponses();

    /**
     * Returns all successful responses.
     *
     * @return ResponseInterface[]
     */
    public function getResponses();

    /**
     * Checks if there is a successful response for a request.
     *
     * @param RequestInterface $request
     *
     * @return boolean
     */
    public function isSuccessful(RequestInterface $request);

    /**
     * Returns the response for a successful request.
     *
     * @param RequestInterface $request
     *
     * @return ResponseInterface
     *
     * @throws \UnexpectedValueException If request was not part of the batch or failed.
     */
    public function getResponseFor(RequestInterface $request);

    /**
     * Adds a response in an immutable way.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     *
     * @return BatchResult the new BatchResult with this request-response pair added to it.
     */
    public function addResponse(RequestInterface $request, ResponseInterface $response);

    /**
     * Checks if there are any unsuccessful requests at all.
     *
     * @return boolean
     */
    public function hasExceptions();

    /**
     * Returns all exceptions for the unsuccessful requests.
     *
     * @return Exception[]
     */
    public function getExceptions();

    /**
     * Checks if there is an exception for a request, meaning the request failed.
     *
     * @param RequestInterface $request
     *
     * @return boolean
     */
    public function isFailed(RequestInterface $request);

    /**
     * Returns the exception for a failed request.
     *
     * @param RequestInterface $request
     *
     * @return Exception
     *
     * @throws \UnexpectedValueException If request was not part of the batch or was successful.
     */
    public function getExceptionFor(RequestInterface $request);

    /**
     * Adds an exception in an immutable way.
     *
     * @param RequestInterface  $request
     * @param Exception         $exception
     *
     * @return BatchResult the new BatchResult with this request-exception pair added to it.
     */
    public function addException(RequestInterface $request, Exception $exception);
}
