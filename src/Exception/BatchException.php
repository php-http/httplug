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

    /**
     * Decides whether the result has any failures
     *
     * @param BatchResult $result
     *
     * @return BatchResult|BatchException
     */
    public static function decideReturnValue(BatchResult $result)
    {
        if ($result->hasExceptions()) {
            return new self($result);
        }

        return $result;
    }
}
