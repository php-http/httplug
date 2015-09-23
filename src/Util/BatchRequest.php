<?php

namespace Http\Client\Util;

use Http\Client\BatchResult;
use Http\Client\Exception;
use Http\Client\Exception\BatchException;
use Psr\Http\Message\RequestInterface;

/**
 * Implements sending multiple request for client not supporting parallels requests
 *
 * Internally, use the sendRequest method
 *
 * Should be used with Http\Client\HttpPsrClient
 *
 * @author Joel Wurtz <jwurtz@jolicode.com>
 */
trait BatchRequest
{
    /**
     * {@inheritdoc}
     */
    abstract public function sendRequest(RequestInterface $request, array $options = []);

    /**
     * {@inheritdoc}
     */
    public function sendRequests(array $requests, array $options = [])
    {
        $batchResult    = new BatchResult();
        $batchException = new BatchException();
        $batchException->setResult($batchResult);

        foreach ($requests as $request) {
            try {
                $batchResult->addResponse($request, $this->sendRequest($request, $options));
            } catch (Exception $e) {
                $batchException->addException($request, $e);
            }
        }

        if (count($batchException->getExceptions()) > 0) {
            throw $batchException;
        }

        return $batchResult;
    }
}
