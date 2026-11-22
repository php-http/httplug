<?php

namespace Http\Client\Tests;

use PHPUnit\Framework\MockObject\Stub;

/**
 * Uses createStub() where available (PHPUnit >= 8.4) and falls back to createMock() for PHPUnit 7.5 (PHP 7.1).
 */
trait CreatesStubs
{
    /**
     * @template T of object
     *
     * @param class-string<T> $className
     *
     * @return T&Stub
     */
    private function stub(string $className)
    {
        if (method_exists($this, 'createStub')) {
            return $this->createStub($className);
        }

        return $this->createMock($className);
    }
}
