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
    const PENDING   = 0;
    const FULFILLED = 1;
    const REJECTED  = 2;

    /**
     * Add behavior for when the promise is resolved or rejected (response will be available, or error happens)
     *
     * @param callable $onFulfilled Called when a response will be available.
     *
     * It will receive a Psr\Http\Message\RequestInterface object as the first argument
     * If the callback is null it must not be called.
     *
     * @param callable $onRejected  Called when an error happens.
     *
     * It will receive a Http\Client\Exception object as the first argument.
     * If the callback is null it must not be called.
     *
     * @return Promise Always returns a new promise which is resolved with value of the executed callback (onFulfilled / onRejected)
     */
    public function then(callable $onFulfilled = null, callable $onRejected = null);

    /**
     * Get the state of the promise, one of PENDING, FULFILLED or REJECTED
     *
     * @return int
     */
    public function getState();
}
