<?php

namespace Http\Client;

use Http\Client\Exception\BatchException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Sends one or more PSR-7 Request
 *
 * Implementations should be configured in their constructor. For runtime behaviour changes, there
 * is an $options parameter. It SHOULD be validated by the client and an exception thrown if
 * unknown options are passed.
 * Option that must be accepted by every client implementation (though it is free to ignore them
 * if the underlying implementation does not support the option):
 *
 *   - timeout (int): the timeout for the HTTP request in seconds. 0 means to use the default.
 *
 * @author GeLo <geloen.eric@gmail.com>
 */
interface HttpPsrClient
{
    /**
     * Sends a PSR request
     *
     * @param RequestInterface $request
     * @param array            $options
     *
     * @return ResponseInterface
     *
     * @throws Exception
     */
    public function sendRequest(RequestInterface $request, array $options = []);

    /**
     * Sends PSR requests
     *
     * If one or more requests led to an exception, the BatchException is thrown.
     * The BatchException also gives access to the BatchResult for the successful responses.
     *
     * @param RequestInterface[] $requests
     * @param array              $options
     *
     * @return BatchResult If all requests where successful.
     *
     * @throws Exception
     * @throws BatchException
     */
    public function sendRequests(array $requests, array $options = []);
}
