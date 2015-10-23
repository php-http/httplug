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
     * Sends a PSR-7 request.
     *
     * @param RequestInterface $request
     *
     * @return ResponseInterface
     *
     * @throws Exception
     */
    public function sendRequest(RequestInterface $request);

    /**
     * Sends several PSR-7 requests.
     *
     * If the client is able to, these requests should be sent in parallel. Otherwise they will be sent sequentially.
     * Either way, the caller may not rely on them being executed in any particular order.
     *
     * If one or more requests led to an exception, the BatchException is thrown. The BatchException gives access to the
     * BatchResult that contains responses for successful calls and exceptions for unsuccessful calls.
     *
     * @param RequestInterface[] $requests
     *
     * @return BatchResult If all requests where successful.
     *
     * @throws Exception      On general setup problems.
     * @throws BatchException If one or more requests led to exceptions.
     */
    public function sendRequests(array $requests);
}
