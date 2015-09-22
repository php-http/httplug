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
     * Returns successful responses or null
     *
     * @return BatchResult
     */
    public function getResult()
    {
        return $this->result;
    }
}
