<?php

namespace Http\Client\Exception;

use Psr\Http\Message\RequestInterface;

/**
 * Thrown when a request is available
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class RequestException extends TransferException
{
    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * @param string           $message
     * @param RequestInterface $request
     * @param \Exception|null  $previous
     */
    public function __construct($message, RequestInterface $request, \Exception $previous = null)
    {
        $this->request = $request;

        parent::__construct($message, 0, $previous);
    }

    /**
     * Returns the request
     *
     * @return RequestInterface
     */
    public function getRequest()
    {
        return $this->request;
    }
}
