<?php

namespace Http\Client\Exception;

use Psr\Http\Client\NetworkExceptionInterface as PsrNetworkException;

/**
 * Thrown when the request cannot be completed because of network issues.
 *
 * There is no response object as this exception is thrown when no response has been received.
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class NetworkException extends RequestException implements PsrNetworkException
{
}
