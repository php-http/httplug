<?php

namespace Http\Client;

/**
 * Implements HTTP conventional methods
 *
 * Should be used with Http\Client\HttpMethodsClient
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
trait HttpMethods
{
    /**
     * {@inheritdoc}
     */
    public function get($uri, array $headers = [])
    {
        return $this->send('GET', $uri, $headers, null);
    }

    /**
     * {@inheritdoc}
     */
    public function head($uri, array $headers = [])
    {
        return $this->send('HEAD', $uri, $headers, null);
    }

    /**
     * {@inheritdoc}
     */
    public function trace($uri, array $headers = [])
    {
        return $this->send('TRACE', $uri, $headers, null);
    }

    /**
     * {@inheritdoc}
     */
    public function post($uri, array $headers = [], $body = null)
    {
        return $this->send('POST', $uri, $headers, $body);
    }

    /**
     * {@inheritdoc}
     */
    public function put($uri, array $headers = [], $body = null)
    {
        return $this->send('PUT', $uri, $headers, $body);
    }

    /**
     * {@inheritdoc}
     */
    public function patch($uri, array $headers = [], $body = null)
    {
        return $this->send('PATCH', $uri, $headers, $body);
    }

    /**
     * {@inheritdoc}
     */
    public function delete($uri, array $headers = [], $body = null)
    {
        return $this->send('DELETE', $uri, $headers, $body);
    }

    /**
     * {@inheritdoc}
     */
    public function options($uri, array $headers = [], $body = null)
    {
        return $this->send('OPTIONS', $uri, $headers, $body);
    }

    /**
     * {@inheritdoc}
     */
    abstract public function send($method, $uri, array $headers = [], $body = null);
}
