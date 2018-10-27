<?php

namespace Http\Client;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Sends a PSR-7 Request and returns a PSR-7 response.
 *
 * @author GeLo <geloen.eric@gmail.com>
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 * @author David Buchmann <mail@davidbu.ch>
 */
interface HttpClient extends ClientInterface
{
    /**
     * Sends a PSR-7 request.
     *
     * @throws \Http\Client\Exception If an error happens during processing the request.
     * @throws \Exception             If processing the request is impossible (eg. bad configuration).
     */
    public function sendRequest(RequestInterface $request): ResponseInterface;
}
