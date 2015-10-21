<?php

namespace Http\Client\Exception;

use Psr\Http\Message\RequestInterface;

/**
 * Base exception for when a request failed.
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class RequestException extends TransferException
{
    /**
     * @var RequestInterface
     */
    private $request;

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

    /**
     * @param RequestInterface $request
     * @param \Exception       $e
     *
     * @return RequestException
     */
    public static function wrapException(RequestInterface $request, \Exception $e)
    {
        if (!$e instanceof RequestException) {
            $e = new RequestException($e->getMessage(), $request, $e);
        }

        return $e;
    }
}
