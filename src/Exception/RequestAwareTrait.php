<?php

namespace Http\Client\Exception;

use Psr\Http\Message\RequestInterface;

trait RequestAwareTrait
{
    /**
     * @var \Psr\Http\Message\RequestInterface
     */
    private $request;

    private function setRequest(RequestInterface $request)
    {
        $this->request = $request;
    }

    /**
     * {@inheritdoc}
     */
    public function getRequest(): RequestInterface
    {
        return $this->request;
    }
}
