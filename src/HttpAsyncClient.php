<?php

namespace Http\Client;

use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;

/**
 * Sends a PSR-7 Request in an asynchronous way by returning a Promise.
 *
 * @author Joel Wurtz <joel.wurtz@gmail.com>
 */
interface HttpAsyncClient
{
    /**
     * Sends a PSR-7 request in an asynchronous way.
     *
     * Exceptions related to processing the request are available from the returned Promise.
     *
     * @param RequestInterface $request
     *
     * @throws \Exception If processing the request is impossible (eg. bad configuration).
     *
     * @return Promise
     */
    public function sendAsyncRequest(RequestInterface $request);
}
