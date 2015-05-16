<?php

/*
 * This file is part of the Http Adapter package.
 *
 * (c) Eric GELOEN <geloen.eric@gmail.com>
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 */

namespace Http\Adapter;

/**
 * Allows global configurations
 *
 * @author Márk Sági-Kazár mark.sagikazar@gmail.com>
 */
interface Configurable
{
    /**
     * Returns a sepcific option or null
     *
     * @param string $name
     *
     * @return mixed
     */
    public function getOption($name);

    /**
     * Returns all options
     *
     * @return array
     */
    public function getOptions();

    /**
     * Checks if an option is set
     *
     * @param string $name
     *
     * @return boolean
     */
    public function hasOption($name);

    /**
     * Sets an option
     *
     * @param string $name
     * @param mixed  $option
     */
    public function setOption($name, $option);

    /**
     * Sets all options
     *
     * @param array $options
     */
    public function setOptions($options);
}
