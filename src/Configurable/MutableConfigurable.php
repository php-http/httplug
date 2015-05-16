<?php

/*
 * This file is part of the Http Adapter package.
 *
 * (c) Eric GELOEN <geloen.eric@gmail.com>
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 */

namespace Http\Adapter\Configurable;

use Http\Adapter\Configurable;

/**
 * Allows to modify configuration a mutable way
 *
 * @author Márk Sági-Kazár mark.sagikazar@gmail.com>
 */
interface MutableConfigurable extends Configurable
{
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
