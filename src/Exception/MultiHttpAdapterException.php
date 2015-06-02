<?php

/*
 * This file is part of the Http Adapter package.
 *
 * (c) Eric GELOEN <geloen.eric@gmail.com>
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 */

namespace Http\Adapter\Exception;

use Http\Adapter\Exception;
use Psr\Http\Message\ResponseInterface;

/**
 * @author GeLo <geloen.eric@gmail.com>
 */
class MultiHttpAdapterException extends \Exception implements Exception
{
    /**
     * @var HttpAdapterException[]
     */
    private $exceptions;

    /**
     * @var ResponseInterface[]
     */
    private $responses;

    /**
     * @param HttpAdapterException[] $exceptions
     * @param ResponseInterface[]    $responses
     */
    public function __construct(array $exceptions = [], array $responses = [])
    {
        parent::__construct('An error occurred when sending multiple requests.');

        $this->setExceptions($exceptions);
        $this->setResponses($responses);
    }

    /**
     * Returns all exceptions
     *
     * @return HttpAdapterException[]
     */
    public function getExceptions()
    {
        return $this->exceptions;
    }

    /**
     * Checks if a specific exception exists
     *
     * @param HttpAdapterException $exception
     *
     * @return boolean TRUE if there is the exception else FALSE.
     */
    public function hasException(HttpAdapterException $exception)
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
     * Sets the exceptions
     *
     * @param HttpAdapterException[] $exceptions
     */
    public function setExceptions(array $exceptions)
    {
        $this->clearExceptions();
        $this->addExceptions($exceptions);
    }

    /**
     * Adds an exception
     *
     * @param HttpAdapterException $exception
     */
    public function addException(HttpAdapterException $exception)
    {
        $this->exceptions[] = $exception;
    }

    /**
     * Adds some exceptions
     *
     * @param HttpAdapterException[] $exceptions
     */
    public function addExceptions(array $exceptions)
    {
        foreach ($exceptions as $exception) {
            $this->addException($exception);
        }
    }

    /**
     * Removes an exception
     *
     * @param HttpAdapterException $exception
     */
    public function removeException(HttpAdapterException $exception)
    {
        unset($this->exceptions[array_search($exception, $this->exceptions, true)]);
        $this->exceptions = array_values($this->exceptions);
    }

    /**
     * Removes some exceptions
     *
     * @param HttpAdapterException[] $exceptions
     */
    public function removeExceptions(array $exceptions)
    {
        foreach ($exceptions as $exception) {
            $this->removeException($exception);
        }
    }

    /**
     * Clears all exceptions
     */
    public function clearExceptions()
    {
        $this->exceptions = [];
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

    /**
     * Sets the responses
     *
     * @param ResponseInterface[] $responses
     */
    public function setResponses(array $responses)
    {
        $this->clearResponses();
        $this->addResponses($responses);
    }

    /**
     * Adds a response
     *
     * @param ResponseInterface $response
     */
    public function addResponse(ResponseInterface $response)
    {
        $this->responses[] = $response;
    }

    /**
     * Adds some responses
     *
     * @param ResponseInterface[] $responses
     */
    public function addResponses(array $responses)
    {
        foreach ($responses as $response) {
            $this->addResponse($response);
        }
    }

    /**
     * Removes a response
     *
     * @param ResponseInterface $response
     */
    public function removeResponse(ResponseInterface $response)
    {
        unset($this->responses[array_search($response, $this->responses, true)]);
        $this->responses = array_values($this->responses);
    }

    /**
     * Removes some responses
     *
     * @param ResponseInterface[] $responses
     */
    public function removeResponses(array $responses)
    {
        foreach ($responses as $response) {
            $this->removeResponse($response);
        }
    }

    /**
     * Clears all responses
     */
    public function clearResponses()
    {
        $this->responses = [];
    }
}
