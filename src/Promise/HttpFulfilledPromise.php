<?php

namespace Http\Client\Promise;

use Http\Client\Exception;
use Http\Promise\Promise;
use Psr\Http\Message\ResponseInterface;

final class HttpFulfilledPromise implements Promise
{
    /**
     * @var mixed
     */
    private $response;

    /**
     * @param mixed $response
     */
    public function __construct($response)
    {
        $this->response = $response;
    }

    /**
     * {@inheritdoc}
     */
    public function then(callable $onFulfilled = null, callable $onRejected = null)
    {
        if (null === $onFulfilled) {
            return $this;
        }

        try {
            return new self($onFulfilled($this->response));
        } catch (Exception $e) {
            return new HttpRejectedPromise($e);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getState()
    {
        return Promise::FULFILLED;
    }

    /**
     * {@inheritdoc}
     */
    public function wait($unwrap = true)
    {
        if ($unwrap) {
            return $this->response;
        }
    }
}
