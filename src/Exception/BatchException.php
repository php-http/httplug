<?php

namespace Http\Client\Exception;

use Http\Client\BatchResult;

/**
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
final class BatchException extends RuntimeException
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
     * Returns a list BatchResult which contains succesful responses and exceptions for failed requests.
     *
     * @return BatchResult
     */
    public function getResult()
    {
        return $this->result;
    }
}
