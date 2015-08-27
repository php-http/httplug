<?php

namespace Http\Client\Exception;

use Psr\Http\Message\ResponseInterface;

/**
 * @author GeLo <geloen.eric@gmail.com>
 */
final class BatchException extends TransferException
{
    /**
     * @var TransferException[]
     */
    private $exceptions;

    /**
     * @var ResponseInterface[]
     */
    private $responses;

    /**
     * @param TransferException[] $exceptions
     * @param ResponseInterface[]   $responses
     */
    public function __construct(array $exceptions = [], array $responses = [])
    {
        parent::__construct('An error occurred when sending multiple requests.');

        foreach ($exceptions as $e) {
            if (!$e instanceof TransferException) {
                throw new InvalidArgumentException('Exception is not an instanceof Http\Client\Exception\TransferException');
            }
        }

        foreach ($responses as $response) {
            if (!$response instanceof ResponseInterface) {
                throw new InvalidArgumentException('Response is not an instanceof Psr\Http\Message\ResponseInterface');
            }
        }


        $this->exceptions = $exceptions;
        $this->responses = $responses;
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

    /**
     * Returns all responses
     *
     * @return ResponseInterface[]
     */
    public function getResponses()
    {
        return $this->responses;
    }

    /**
     * Checks if a specific response exists
     *
     * @param ResponseInterface $response
     *
     * @return boolean
     */
    public function hasResponse(ResponseInterface $response)
    {
        return array_search($response, $this->responses, true) !== false;
    }

    /**
     * Checks if any response exists
     *
     * @return boolean
     */
    public function hasResponses()
    {
        return !empty($this->responses);
    }
}
