<?php

namespace Http\Client\Exception;

use Http\Client\BatchResult;
use Http\Client\Exception;
use Psr\Http\Message\RequestInterface;

/**
 * This exception is thrown when a batch of requests led to at least one failure.
 *
 * It holds the response/exception pairs and gives access to a BatchResult with the successful responses.
 *
*@author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
final class BatchException extends \RuntimeException implements Exception
{
    /**
     * @var BatchResult
     */
    private $result;

    /**
     * @param BatchResult $result
     */
    public function __construct(BatchResult $result)
    {
        $this->result = $result;
    }

    /**
     * Returns the BatchResult that contains all responses and exceptions
     *
     * @return BatchResult
     */
    public function getResult()
    {
        return $this->result;
    }
}
