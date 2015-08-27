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

    /**
     * Factory method to create a new exception with a normalized error message
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param \Exception|null   $previous
     *
     * @return HttpException
     */
    public static function create(RequestInterface $request, ResponseInterface $response, \Exception $previous = null)
    {
        $code = floor($response->getStatusCode() / 100);

        if ($code == '4') {
            $message = 'Client error';
            $className = __NAMESPACE__ . '\\ClientException';
        } elseif ($code == '5') {
            $message = 'Server error';
            $className = __NAMESPACE__ . '\\ServerException';
        } else {
            $message = 'Unsuccessful response';
            $className = __CLASS__;
        }

        $message = sprintf(
            '%s [url] %s [http method] %s [status code] %s [reason phrase] %s',
            $message,
            $request->getRequestTarget(),
            $request->getMethod(),
            $response->getStatusCode(),
            $response->getReasonPhrase()
        );

        return new $className($message, $request, $response, $previous);
    }
}
