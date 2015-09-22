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

    public function __construct()
    {
        $this->responses = new \SplObjectStorage();
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
     *
     * @internal
     */
    public function addResponse(RequestInterface $request, ResponseInterface $response)
    {
        $new = clone $this;
        $new->responses->attach($request, $response);

        return $new;
    }

    public function __clone()
    {
        $this->responses = clone $this->responses;
    }
}
