<?php

namespace Http\Client;

use Psr\Http\Client\ClientException as PsrClientException;

/**
 * Every HTTP Client related Exception must implement this interface.
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
interface Exception extends PsrClientException
{
}
