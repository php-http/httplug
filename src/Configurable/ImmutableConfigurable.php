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
 * Allows to modify configuration an immutable way
 *
 * @author Márk Sági-Kazár mark.sagikazar@gmail.com>
 */
interface ImmutableConfigurable extends Configurable
{
    /**
     * Sets an option
     *
     * @param string $name
     * @param mixed  $option
     *
     * @return self
     */
    public function withOption($name, $option);

    /**
     * Removes an option
     *
     * @param string $name
     *
     * @return self
     */
    public function withoutOption($name);
}
