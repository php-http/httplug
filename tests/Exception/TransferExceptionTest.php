<?php

namespace Http\Client\Tests\Exception;

use Http\Client\Exception;
use Http\Client\Exception\TransferException;
use PHPUnit\Framework\TestCase;

final class TransferExceptionTest extends TestCase
{
    public function testIsARuntimeException(): void
    {
        $this->assertInstanceOf(\RuntimeException::class, new TransferException());
    }

    public function testIsAnHttplugException(): void
    {
        $this->assertInstanceOf(Exception::class, new TransferException());
    }
}
