<?php

namespace Http\Client;

use Psr\Http\Message\ResponseInterface;

/**
 * Promise represents a response that may not be available yet, but will be resolved at some point in future.
 * It acts like a proxy to the actual response.
 *
 * This interface is an extension of the promises/a+ specification https://promisesaplus.com/
 * Value is replaced by an object where its class implement a Psr\Http\Message\RequestInterface.
 * Reason is replaced by an object where its class implement a Http\Client\Exception.
 *
 * @author Joel Wurtz <joel.wurtz@gmail.com>
 */
interface Promise
{
    /**
     * Pending state, promise has not been fulfilled or rejected.
     *
     * When pending, a promise may transition to either the fulfilled or rejected state.
     */
    const PENDING   = 0;

    /**
     * Fulfilled state, promise has been fulfilled with a ResponseInterface object.
     *
     * When fulfilled, a promise must not transition to any other state.
     * When fulfilled, a promise must have a value, which must not change.
     */
    const FULFILLED = 1;

    /**
     * Rejected state, promise has been rejected with an Exception object.
     *
     * When rejected, a promise must not transition to any other state.
     * When rejected, a promise must have a reason, which must not change.
     */
    const REJECTED  = 2;

    /**
     * Add behavior for when the promise is resolved or rejected (response will be available, or error happens)
     *
     * @param callable $onFulfilled Called when a response will be available.
     *
     * It will receive a Psr\Http\Message\RequestInterface object as the first argument
     * If the callback is null it must not be called.
     * It must be called after promise is fulfilled, with promise’s value (ResponseInterface) as its first argument.
     * It must not be called before promise is fulfilled.
     * It must not be called more than once.
     *
     * @param callable $onRejected Called when an error happens.
     *
     * It will receive a Http\Client\Exception object as the first argument.
     * If the callback is null it must not be called.
     * It must be called after promise is rejected, with promise’s reason (Exception) as its first argument.
     * It must not be called before promise is rejected.
     * It must not be called more than once.
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

    /**
     * Return the value of the promise (fulfilled)
     *
     * @return null|ResponseInterface Null if the promise is rejected or pending, the response object otherwise
     */
    public function getResponse();

    /**
     * Return the reason of the promise (rejected)
     *
     * @return null|Exception Null if the promise is fulfilled or pending, the exception object otherwise
     */
    public function getError();
}
