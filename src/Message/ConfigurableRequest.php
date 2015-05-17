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

use Psr\Http\Message\RequestInterface;
use Psr\Http\HasConfiguration;

/**
 * Allows to modify configuration in a request an immutable way
 *
 * @author Márk Sági-Kazár mark.sagikazar@gmail.com>
 */
interface ConfigurableRequest extends RequestInterface, HasConfiguration
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
