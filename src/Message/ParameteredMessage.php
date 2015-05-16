<?php

/*
 * This file is part of the Http Adapter package.
 *
 * (c) Eric GELOEN <geloen.eric@gmail.com>
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 */

namespace Http\Adapter\Message;

/**
 * @author GeLo <geloen.eric@gmail.com>
 */
interface ParameteredMessage
{
    /**
     * Returns a parameter by name
     *
     * @param string $name
     *
     * @return mixed
     */
    public function getParameter($name);

    /**
     * Returns the parameters
     *
     * @return array
     */
    public function getParameters();

    /**
     * Checks if the parameter exists
     *
     * @param string $name
     *
     * @return boolean
     */
    public function hasParameter($name);

    /**
     * Checks if any parameter exists
     *
     * @return boolean
     */
    public function hasParameters();

    /**
     * Sets a parameter by name
     *
     * @param string $name
     * @param mixed  $value
     *
     * @return self
     */
    public function withParameter($name, $value);

    /**
     * Adds a parameter
     *
     * @param string $name
     * @param mixed  $value
     *
     * @return self
     */
    public function withAddedParameter($name, $value);

    /**
     * Removes a parameter
     *
     * @param string $name
     *
     * @return self
     */
    public function withoutParameter($name);
}
