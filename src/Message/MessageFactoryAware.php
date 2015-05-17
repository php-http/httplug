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
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
interface MessageFactoryAware
{
    /**
     * Returns a Message Factory
     *
     * @return MessageFactory
     */
    public function getMessageFactory();

    /**
     * Sets a Message Factory
     *
     * @param MessageFactory $messageFactory
     */
    public function setMessageFactory(MessageFactory $messageFactory);
}
