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
     * Returns all successful responses.
     *
     * @return ResponseInterface[]
     */
    public function getResponses();

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
     * Checks if there are any successful responses at all
     *
     * @return boolean
     */
    public function hasResponses();

    /**
     * Checks if there is a successful response for a request.
     *
     * @param RequestInterface $request
     *
     * @return ResponseInterface
     */
    public function hasResponseFor(RequestInterface $request);

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
     * Checks if a request was successful.
     *
     * @param RequestInterface $request
     *
     * @return boolean
     */
    public function isSuccessful(RequestInterface $request);

    /**
     * Checks if a request has failed.
     *
     * @param RequestInterface $request
     *
     * @return boolean
     */
    public function isFailed(RequestInterface $request);

    /**
     * Returns all exceptions for the unsuccessful requests.
     *
     * @return Exception[]
     */
    public function getExceptions();

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
     * Checks if there is an exception for a request.
     *
     * @param RequestInterface $request
     *
     * @return boolean
     */
    public function hasExceptionFor(RequestInterface $request);

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
