<?php

namespace Http\Client\Exception;

use Http\Client\BatchResult;
use Http\Client\Exception;
use Psr\Http\Message\RequestInterface;

/**
 * This exception is thrown when a batch of requests led to at least one failure.
 *
 * It holds the response/exception pairs and gives access to a BatchResult with the successful responses.
 *
*@author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
final class BatchException extends RuntimeException
{
    /**
     * @var BatchResult
     */
    private $result;

    /**
     * @var \SplObjectStorage
     */
    private $exceptions;

    public function __construct()
    {
        $this->exceptions = new \SplObjectStorage();
    }

    /**
     * Returns the BatchResult that contains those responses that where successful.
     *
     * Note that the BatchResult may contains 0 responses if all requests failed.
     *
     * @return BatchResult
     */
    public function getResult()
    {
        if (!isset($this->result)) {
            $this->result = new BatchResult();
        }

        return $this->result;
    }

    /**
     * Sets the successful response list
     *
     * @param BatchResult $result
     *
     * @throws InvalidArgumentException If the BatchResult is already set
     *
     * @internal
     */
    public function setResult(BatchResult $result)
    {
        if (isset($this->result)) {
            throw new InvalidArgumentException('BatchResult is already set');
        }

        $this->result = $result;
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
        return $this->getResult()->hasResponseFor($request);
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
     * @return boolean
     */
    public function hasExceptionFor(RequestInterface $request)
    {
        return $this->exceptions->contains($request);
    }

    /**
     * Adds an exception
     *
     * @param RequestInterface  $request
     * @param Exception         $exception
     */
    public function addException(RequestInterface $request, Exception $exception)
    {
        $this->exceptions->attach($request, $exception);
    }
}
