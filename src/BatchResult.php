<?php

namespace Http\Client;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Successful responses and exceptions returned from parallel request execution
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
final class BatchResult
{
    /**
     * @var \SplObjectStorage
     */
    private $responses;

    /**
     * @var \SplObjectStorage
     */
    private $exceptions;

    public function __construct()
    {
        $this->responses = new \SplObjectStorage();
        $this->exceptions = new \SplObjectStorage();
    }

    /**
     * Checks if a request is successful
     *
     * @param RequestInterface $request
     *
     * @return boolean
     */
    public function isSuccessful(RequestInterface $request)
    {
        return $this->responses->contains($request);
    }

    /**
     * Checks if a request is failed
     *
     * @param RequestInterface $request
     *
     * @return boolean
     */
    public function isFailed(RequestInterface $request)
    {
        return $this->exceptions->contains($request);
    }

    /**
     * Returns all successful responses
     *
     * @return ResponseInterface[]
     */
    public function getResponses()
    {
        $responses = [];

        foreach ($this->responses as $request) {
            $responses[] = $this->responses[$request];
        }

        return $responses;
    }

    /**
     * Returns a response of a request or null if not found
     *
     * @param RequestInterface $request
     *
     * @return ResponseInterface|null
     */
    public function getResponseFor(RequestInterface $request)
    {
        if ($this->responses->contains($request)) {
            return $this->responses[$request];
        }
    }

    /**
     * Checks if there are any successful responses at all
     *
     * @return boolean
     */
    public function hasResponses()
    {
        return $this->responses->count() > 0;
    }

    /**
     * Checks if there is a response of a request
     *
     * @param RequestInterface $request
     *
     * @return ResponseInterface
     */
    public function hasResponseFor(RequestInterface $request)
    {
        return $this->responses->contains($request);
    }

    /**
     * Adds a response in an immutable way
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     *
     * @return BatchResult
     */
    public function addResponse(RequestInterface $request, ResponseInterface $response)
    {
        $new = clone $this;
        $new->responses->attach($request, $response);

        return $new;
    }

    /**
     * Returns all exceptions
     *
     * @return Exception[]
     */
    public function getExceptions()
    {
        $exceptions = [];

        foreach ($this->exceptions as $request) {
            $exceptions[] = $this->exceptions[$request];
        }

        return $exceptions;
    }

    /**
     * Returns an exception for a request or null if not found
     *
     * @param RequestInterface $request
     *
     * @return Exception|null
     */
    public function getExceptionFor(RequestInterface $request)
    {
        if ($this->exceptions->contains($request)) {
            return $this->exceptions[$request];
        }
    }

    /**
     * Checks if there are any exceptions at all
     *
     * @return boolean
     */
    public function hasExceptions()
    {
        return $this->exceptions->count() > 0;
    }

    /**
     * Checks if there is an exception for a request
     *
     * @param RequestInterface $request
     *
     * @return Exception
     */
    public function hasExceptionFor(RequestInterface $request)
    {
        return $this->exceptions->contains($request);
    }

    /**
     * Adds an exception in an immutable way
     *
     * @param RequestInterface  $request
     * @param Exception         $exception
     *
     * @return BatchResult
     */
    public function addException(RequestInterface $request, Exception $exception)
    {
        $new = clone $this;
        $new->exceptions->attach($request, $exception);

        return $new;
    }

    public function __clone()
    {
        $this->responses = clone $this->responses;
        $this->exceptions = clone $this->exceptions;
    }
}
