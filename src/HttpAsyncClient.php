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
     * @param RequestInterface $request
     *
     * @return Promise
     *
     * @throws \Exception If processing the request is impossible (eg. bad configuration)
     */
    public function sendAsyncRequest(RequestInterface $request);
}
