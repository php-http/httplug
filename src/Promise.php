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
     */
    const PENDING   = "pending";

    /**
     * Fulfilled state, promise has been fulfilled with a ResponseInterface object.
     */
    const FULFILLED = "fulfilled";

    /**
     * Rejected state, promise has been rejected with an Exception object.
     */
    const REJECTED  = "rejected";

    /**
     * Add behavior for when the promise is resolved or rejected (response will be available, or error happens).
     *
     * If you do not care about one of the cases, you can set the corresponding callable to null
     * The callback will be called when the response or exception arrived and never more than once.
     *
     * @param callable $onFulfilled Called when a response will be available.
     * @param callable $onRejected  Called when an error happens.
     *
     * You must always return the Response in the interface or throw an Exception.
     *
     * @return Promise Always returns a new promise which is resolved with value of the executed callback (onFulfilled / onRejected).
     */
    public function then(callable $onFulfilled = null, callable $onRejected = null);

    /**
     * Get the state of the promise, one of PENDING, FULFILLED or REJECTED
     *
     * @return int
     */
    public function getState();

    /**
     * Return the value of the promise (fulfilled).
     *
     * @return ResponseInterface Response Object only when the Promise is fulfilled.
     *
     * @throws \LogicException When the promise is not fulfilled.
     */
    public function getResponse();

    /**
     * Get the reason why the promise was rejected..
     *
     * If the exception is an instance of Http\Client\Exception\HttpException it will contain
     * the response object with the status code and the http reason.
     *
     * @return Exception Exception Object only when the Promise is rejected.
     *
     * @throws \LogicException When the promise is not rejected.
     */
    public function getException();

    /**
     * Wait for the promise to be fulfilled or rejected.
     *
     * When this method returns, the request has been resolved and the appropriate callable has terminated.
     */
    public function wait();
}
