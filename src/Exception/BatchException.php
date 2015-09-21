<?php

namespace Http\Client\Exception;

/**
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
final class BatchException extends TransferException
{
    /**
     * @var TransferException[]
     */
    private $exceptions;

    /**
     * @param TransferException[] $exceptions
     */
    public function __construct(array $exceptions = [])
    {
        parent::__construct('An error occurred when sending multiple requests.');

        foreach ($exceptions as $e) {
            if (!$e instanceof TransferException) {
                throw new InvalidArgumentException('Exception is not an instanceof Http\Client\Exception\TransferException');
            }
        }

        $this->exceptions = $exceptions;
    }

    /**
     * Returns all exceptions
     *
     * @return TransferException[]
     */
    public function getExceptions()
    {
        return $this->exceptions;
    }

    /**
     * Checks if a specific exception exists
     *
     * @param TransferException $exception
     *
     * @return boolean TRUE if there is the exception else FALSE.
     */
    public function hasException(TransferException $exception)
    {
        return array_search($exception, $this->exceptions, true) !== false;
    }

    /**
     * Checks if any exception exists
     *
     * @return boolean
     */
    public function hasExceptions()
    {
        return !empty($this->exceptions);
    }
}
