<?php

namespace Http\Client;

use Http\Client\Exception\BatchException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Sends one or more PSR-7 Request and returns PSR-7 responses.
 *
 * @author GeLo <geloen.eric@gmail.com>
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 * @author David Buchmann <mail@davidbu.ch>
 */
interface HttpClient
{
    /**
     * Sends a PSR request
     *
     * @param RequestInterface $request
     *
     * @return ResponseInterface
     *
     * @throws Exception
     */
    public function sendRequest(RequestInterface $request);

    /**
     * Sends PSR requests
     *
     * If one or more requests led to an exception, the BatchException is thrown.
     * The BatchException also gives access to the BatchResult for the successful responses.
     *
     * @param RequestInterface[] $requests
     *
     * @return BatchResult If all requests where successful.
     *
     * @throws Exception
     * @throws BatchException
     */
    public function sendRequests(array $requests);
}
