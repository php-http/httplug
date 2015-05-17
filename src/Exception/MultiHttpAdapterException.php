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
interface MultiHttpAdapterException extends Exception
{
    /**
     * Returns all exceptions
     *
     * @return HttpAdapterException[]
     */
    public function getExceptions();

    /**
     * Checks if a specific exception exists
     *
     * @param HttpAdapterException $exception
     *
     * @return boolean TRUE if there is the exception else FALSE.
     */
    public function hasException(HttpAdapterException $exception);

    /**
     * Checks if any exception exists
     *
     * @return boolean
     */
    public function hasExceptions();

    /**
     * Sets the exceptions
     *
     * @param HttpAdapterException[] $exceptions
     */
    public function setExceptions(array $exceptions);

    /**
     * Adds an exception
     *
     * @param HttpAdapterException $exception
     */
    public function addException(HttpAdapterException $exception);

    /**
     * Adds some exceptions
     *
     * @param HttpAdapterException[] $exceptions
     */
    public function addExceptions(array $exceptions);

    /**
     * Removes an exception
     *
     * @param HttpAdapterException $exception
     */
    public function removeException(HttpAdapterException $exception);

    /**
     * Removes some exceptions
     *
     * @param HttpAdapterException[] $exceptions
     */
    public function removeExceptions(array $exceptions);

    /**
     * Clears all exceptions
     */
    public function clearExceptions();

    /**
     * Returns all responses
     *
     * @return ResponseInterface[]
     */
    public function getResponses();

    /**
     * Checks if a specific response exists
     *
     * @param ResponseInterface $response
     *
     * @return boolean
     */
    public function hasResponse(ResponseInterface $response);

    /**
     * Checks if any response exists
     *
     * @return boolean
     */
    public function hasResponses();

    /**
     * Sets the responses
     *
     * @param ResponseInterface[] $responses
     */
    public function setResponses(array $responses);

    /**
     * Adds a response
     *
     * @param ResponseInterface $response
     */
    public function addResponse(ResponseInterface $response);

    /**
     * Adds some responses
     *
     * @param ResponseInterface[] $responses
     */
    public function addResponses(array $responses);

    /**
     * Removes a response
     *
     * @param ResponseInterface $response
     */
    public function removeResponse(ResponseInterface $response);

    /**
     * Removes some responses
     *
     * @param ResponseInterface[] $responses
     */
    public function removeResponses(array $responses);

    /**
     * Clears all responses
     */
    public function clearResponses();
}
