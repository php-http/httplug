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
 * This interface does not allow modifying options
 *
 * @author Márk Sági-Kazár mark.sagikazar@gmail.com>
 */
interface HasConfiguration
{
    /**
     * Returns an option by name
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
     * Checks if an option exists
     *
     * @param string $name
     *
     * @return boolean
     */
    public function hasOption($name);

    /**
     * Checks if any option exists
     *
     * @return boolean
     */
    public function hasOptions();
}
