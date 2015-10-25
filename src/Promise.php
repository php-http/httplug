<?php

namespace Http\Client;

/**
 * Promise represents a response that may not be available yet, but will be resolved at some point in future.
 * It acts like a proxy to the actual response.
 *
 * @author Joel Wurtz <joel.wurtz@gmail.com>
 */
interface Promise
{
    /**
     * Add behavior for when the promise is resolved or rejected (response will be available, or error happens)
     *
     * @param callable $onFulfilled Called when a response will be available, it will receive a Psr\Http\Message\RequestInterface object as the first argument
     * @param callable $onRejected  Called when an error happens, it will receive a Http\Client\Exception object as the first argument
     *
     * @return Promise Always returns a new promise which is resolved with value of the executed callback (onFulfilled / onRejected)
     */
    public function then(callable $onFulfilled = null, callable $onRejected = null);
}
