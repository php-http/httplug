<?php

/*
 * This file is part of the Http Adapter package.
 *
 * (c) Eric GELOEN <geloen.eric@gmail.com>
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 */

namespace Http\Adapter\Tests;

use Http\Adapter\HttpAdapterException;
use Http\Adapter\Message\InternalRequestInterface;
use Http\Adapter\Message\ResponseInterface;

/**
 * @author GeLo <geloen.eric@gmail.com>
 */
class HttpAdapterExceptionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var HttpAdapterException
     */
    private $exception;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->exception = new HttpAdapterException();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown()
    {
        unset($this->exception);
    }

    public function testDefaultState()
    {
        $this->assertInstanceOf('Exception', $this->exception);
        $this->assertFalse($this->exception->hasRequest());
        $this->assertFalse($this->exception->hasResponse());
    }

    public function testSetRequest()
    {
        $this->exception->setRequest($request = $this->createRequestMock());

        $this->assertTrue($this->exception->hasRequest());
        $this->assertSame($request, $this->exception->getRequest());
    }

    public function testResetRequest()
    {
        $this->exception->setRequest($this->createRequestMock());
        $this->exception->setRequest(null);

        $this->assertFalse($this->exception->hasRequest());
        $this->assertNull($this->exception->getRequest());
    }

    public function testSetResponse()
    {
        $this->exception->setResponse($request = $this->createResponseMock());

        $this->assertTrue($this->exception->hasResponse());
        $this->assertSame($request, $this->exception->getResponse());
    }

    public function testResetResponse()
    {
        $this->exception->setResponse($this->createResponseMock());
        $this->exception->setResponse(null);

        $this->assertFalse($this->exception->hasRequest());
        $this->assertNull($this->exception->getRequest());
    }

    public function testCannotFetchUri()
    {
        $exception = HttpAdapterException::cannotFetchUri('uri', 'adapter', 'error');

        $this->assertInstanceOf('Http\Adapter\HttpAdapterException', $exception);
        $this->assertSame(
            'An error occurred when fetching the URI "uri" with the adapter "adapter" ("error").',
            $exception->getMessage()
        );
    }

    public function testCannotLoadCookieJar()
    {
        $exception = HttpAdapterException::cannotLoadCookieJar('error');

        $this->assertInstanceOf('Http\Adapter\HttpAdapterException', $exception);
        $this->assertSame('An error occurred when loading the cookie jar ("error").', $exception->getMessage());
    }

    public function testCannotSaveCookieJar()
    {
        $exception = HttpAdapterException::cannotSaveCookieJar('error');

        $this->assertInstanceOf('Http\Adapter\HttpAdapterException', $exception);
        $this->assertSame('An error occurred when saving the cookie jar ("error").', $exception->getMessage());
    }

    public function testHttpAdapterDoesNotExist()
    {
        $exception = HttpAdapterException::httpAdapterDoesNotExist('adapter');

        $this->assertInstanceOf('Http\Adapter\HttpAdapterException', $exception);
        $this->assertSame('The http adapter "adapter" does not exist.', $exception->getMessage());
    }

    public function testHttpAdapterIsNotUsable()
    {
        $exception = HttpAdapterException::httpAdapterIsNotUsable('adapter');

        $this->assertInstanceOf('Http\Adapter\HttpAdapterException', $exception);
        $this->assertSame('The http adapter "adapter" is not usable.', $exception->getMessage());
    }

    public function testHttpAdaptersAreNotUsable()
    {
        $exception = HttpAdapterException::httpAdaptersAreNotUsable();

        $this->assertInstanceOf('Http\Adapter\HttpAdapterException', $exception);
        $this->assertSame('No http adapters are usable.', $exception->getMessage());
    }

    public function testHttpAdapterMustImplementInterface()
    {
        $exception = HttpAdapterException::httpAdapterMustImplementInterface('class');

        $this->assertInstanceOf('Http\Adapter\HttpAdapterException', $exception);
        $this->assertSame(
            'The class "class" must implement "Ivory\HttpAdapter\HttpAdapterInterface".',
            $exception->getMessage()
        );
    }

    public function testDoesNotSupportSubAdapter()
    {
        $exception = HttpAdapterException::doesNotSupportSubAdapter('adapter', 'subAdapter');

        $this->assertInstanceOf('Http\Adapter\HttpAdapterException', $exception);
        $this->assertSame(
            'The adapter "adapter" does not support the sub-adapter "subAdapter".',
            $exception->getMessage()
        );
    }

    public function testMaxRedirectsExceeded()
    {
        $exception = HttpAdapterException::maxRedirectsExceeded('uri', 5, 'adapter');

        $this->assertInstanceOf('Http\Adapter\HttpAdapterException', $exception);
        $this->assertSame(
            'An error occurred when fetching the URI "uri" with the adapter "adapter" ("Max redirects exceeded (5)").',
            $exception->getMessage()
        );
    }

    public function testRequestIsNotValidWithObject()
    {
        $exception = HttpAdapterException::requestIsNotValid(new \stdClass());

        $this->assertInstanceOf('Http\Adapter\HttpAdapterException', $exception);
        $this->assertSame(
            'The request must be a string, an array or implement "Psr\Http\Message\RequestInterface" ("stdClass" given).',
            $exception->getMessage()
        );
    }

    public function testRequestIsNotValidWithScalar()
    {
        $exception = HttpAdapterException::requestIsNotValid(true);

        $this->assertInstanceOf('Http\Adapter\HttpAdapterException', $exception);
        $this->assertSame(
            'The request must be a string, an array or implement "Psr\Http\Message\RequestInterface" ("boolean" given).',
            $exception->getMessage()
        );
    }

    public function testStreamIsNotValidWithObject()
    {
        $exception = HttpAdapterException::streamIsNotValid(new \stdClass(), 'wrapper', 'expected');

        $this->assertInstanceOf('Http\Adapter\HttpAdapterException', $exception);
        $this->assertSame(
            'The stream "wrapper" only accepts a "expected" (current: "stdClass").',
            $exception->getMessage()
        );
    }

    public function testStreamIsNotValidWithScalar()
    {
        $exception = HttpAdapterException::streamIsNotValid(true, 'wrapper', 'expected');

        $this->assertInstanceOf('Http\Adapter\HttpAdapterException', $exception);
        $this->assertSame(
            'The stream "wrapper" only accepts a "expected" (current: "boolean").',
            $exception->getMessage()
        );
    }

    public function testTimeoutExceeded()
    {
        $exception = HttpAdapterException::timeoutExceeded('uri', 1.1, 'adapter');

        $this->assertInstanceOf('Http\Adapter\HttpAdapterException', $exception);
        $this->assertSame(
            'An error occurred when fetching the URI "uri" with the adapter "adapter" ("Timeout exceeded (1.10)").',
            $exception->getMessage()
        );
    }

    /**
     * Creates a request mock
     *
     * @return InternalRequestInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    private function createRequestMock()
    {
        return $this->getMock('Http\Adapter\Message\InternalRequestInterface');
    }

    /**
     * Creates a response mock
     *
     * @return ResponseInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    private function createResponseMock()
    {
        return $this->getMock('Http\Adapter\Message\ResponseInterface');
    }
}
