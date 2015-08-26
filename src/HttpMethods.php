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
    public function get($uri, array $headers = [], array $options = [])
    {
        return $this->send('GET', $uri, $headers, null, $options);
    }

    /**
     * {@inheritdoc}
     */
    public function head($uri, array $headers = [], array $options = [])
    {
        return $this->send('HEAD', $uri, $headers, null, $options);
    }

    /**
     * {@inheritdoc}
     */
    public function trace($uri, array $headers = [], array $options = [])
    {
        return $this->send('TRACE', $uri, $headers, null, $options);
    }

    /**
     * {@inheritdoc}
     */
    public function post($uri, array $headers = [], $body = null, array $options = [])
    {
        return $this->send('POST', $uri, $headers, $body, $options);
    }

    /**
     * {@inheritdoc}
     */
    public function put($uri, array $headers = [], $body = null, array $options = [])
    {
        return $this->send('PUT', $uri, $headers, $body, $options);
    }

    /**
     * {@inheritdoc}
     */
    public function patch($uri, array $headers = [], $body = null, array $options = [])
    {
        return $this->send('PATCH', $uri, $headers, $body, $options);
    }

    /**
     * {@inheritdoc}
     */
    public function delete($uri, array $headers = [], $body = null, array $options = [])
    {
        return $this->send('DELETE', $uri, $headers, $body, $options);
    }

    /**
     * {@inheritdoc}
     */
    public function options($uri, array $headers = [], $body = null, array $options = [])
    {
        return $this->send('OPTIONS', $uri, $headers, $body, $options);
    }

    /**
     * {@inheritdoc}
     */
    abstract public function send($method, $uri, array $headers = [], $body = null, array $options = []);
}
