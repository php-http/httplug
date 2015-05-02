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

use Psr\Http\Message\RequestInterface as PsrRequestInterface;

/**
 * @author GeLo <geloen.eric@gmail.com>
 */
interface RequestInterface extends PsrRequestInterface, MessageInterface
{
    /** @const string */
    const METHOD_GET = 'GET';

    /** @const string */
    const METHOD_HEAD = 'HEAD';

    /** @const string */
    const METHOD_TRACE = 'TRACE';

    /** @const string */
    const METHOD_POST = 'POST';

    /** @const string */
    const METHOD_PUT = 'PUT';

    /** @const string */
    const METHOD_PATCH = 'PATCH';

    /** @const string */
    const METHOD_DELETE = 'DELETE';

    /** @const string */
    const METHOD_OPTIONS = 'OPTIONS';
}
