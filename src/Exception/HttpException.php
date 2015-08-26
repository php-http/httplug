<?php

namespace Http\Client\Exception;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Thrown when both a request and a response are available
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class HttpException extends RequestException
{
    /**
     * @var ResponseInterface
     */
    protected $response;

    /**
     * @param string            $message
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param \Exception|null   $previous
     */
    public function __construct(
        $message,
        RequestInterface $request,
        ResponseInterface $response,
        \Exception $previous = null
    ) {
        $this->response = $response;

        parent::__construct($message, $request, $previous);

        $this->code = $response->getStatusCode();
    }

    /**
     * Returns the response
     *
     * @return ResponseInterface
     */
    public function getResponse()
    {
        return $this->response;
    }
}
