<?php

namespace spec\Http\Client;

use Http\Client\HttpMethods;
use Http\Client\HttpMethodsClient;
use PhpSpec\ObjectBehavior;

class HttpMethodsSpec extends ObjectBehavior
{
    function let()
    {
        $this->beAnInstanceOf('spec\Http\Client\HttpMethodsStub');
    }

    function it_sends_a_get_request()
    {
        $data = HttpMethodsStub::$requestData;

        $this->get($data['uri'], $data['headers'], $data['options'])->shouldReturn(true);
    }

    function it_sends_a_head_request()
    {
        $data = HttpMethodsStub::$requestData;

        $this->head($data['uri'], $data['headers'], $data['options'])->shouldReturn(true);
    }

    function it_sends_a_trace_request()
    {
        $data = HttpMethodsStub::$requestData;

        $this->trace($data['uri'], $data['headers'], $data['options'])->shouldReturn(true);
    }

    function it_sends_a_post_request()
    {
        $data = HttpMethodsStub::$requestData;

        $this->post($data['uri'], $data['headers'], $data['body'], $data['options'])->shouldReturn(true);
    }

    function it_sends_a_put_request()
    {
        $data = HttpMethodsStub::$requestData;

        $this->put($data['uri'], $data['headers'], $data['body'], $data['options'])->shouldReturn(true);
    }

    function it_sends_a_patch_request()
    {
        $data = HttpMethodsStub::$requestData;

        $this->patch($data['uri'], $data['headers'], $data['body'], $data['options'])->shouldReturn(true);
    }

    function it_sends_a_delete_request()
    {
        $data = HttpMethodsStub::$requestData;

        $this->delete($data['uri'], $data['headers'], $data['body'], $data['options'])->shouldReturn(true);
    }

    function it_sends_a_options_request()
    {
        $data = HttpMethodsStub::$requestData;

        $this->options($data['uri'], $data['headers'], $data['body'], $data['options'])->shouldReturn(true);
    }
}

class HttpMethodsStub implements HttpMethodsClient
{
    use HttpMethods;

    public static $requestData = [
        'uri'     => '/uri',
        'headers' => [
            'Content-Type' => 'text/plain',
        ],
        'body'    => 'body',
        'options' => [
            'timeout' => 60,
        ],
    ];

    /**
     * {@inheritdoc}
     */
    public function send($method, $uri, array $headers = [], $body = null, array $options = [])
    {
        if (in_array($method, ['GET', 'HEAD', 'TRACE'])) {
            return $uri === self::$requestData['uri'] &&
            $headers === self::$requestData['headers'] &&
            is_null($body) &&
            $options === self::$requestData['options'];
        }

        return in_array($method, ['POST', 'PUT', 'PATCH', 'DELETE', 'OPTIONS']) &&
        $uri === self::$requestData['uri'] &&
        $headers === self::$requestData['headers'] &&
        $body === self::$requestData['body'] &&
        $options === self::$requestData['options'];
    }
}
