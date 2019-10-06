<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Event;

use PHPUnit\Exception;
use PHPUnit\Framework\TestCase;

/**
 * @covers \PHPUnit\Event\UnsupportedEvent
 */
final class UnsupportedEventTest extends TestCase
{
    public function testTypeReturnsUnsupportedEvent(): void
    {
        $subscriberClassName = self::class;

        $type = new NamedType('foo');

        $exception = UnsupportedEvent::type(
            $subscriberClassName,
            $type
        );

        $message =\sprintf(
            'Subscriber "%s" is not subscribed to events of type "%s".',
            $subscriberClassName,
            $type->asString()
        );

        self::assertInstanceOf(\Exception::class, $exception);
        self::assertInstanceOf(Exception::class, $exception);
        self::assertSame($message, $exception->getMessage());
    }
}
