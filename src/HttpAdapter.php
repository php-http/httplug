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

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * @author GeLo <geloen.eric@gmail.com>
 */
interface HttpAdapter
{
    /**
     * Sends a PSR request
     *
     * @param RequestInterface $request
     * @param array            $options
     *
     * @return ResponseInterface
     *
     * @throws \InvalidArgumentException
     * @throws Exception\HttpAdapterException
     */
    public function sendRequest(RequestInterface $request, array $options = []);

    /**
     * Sends PSR requests
     *
     * @param RequestInterface[] $requests
     * @param array              $options
     *
     * @return ResponseInterface[]
     *
     * @throws \InvalidArgumentException
     * @throws Exception\MultiHttpAdapterException
     */
    public function sendRequests(array $requests, array $options = []);

    /**
     * Returns the name
     *
     * @return string
     */
    public function getName();
}
