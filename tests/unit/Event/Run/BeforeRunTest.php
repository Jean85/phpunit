<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Event\Run;

use PHPUnit\Event\GenericType;
use PHPUnit\Framework\TestCase;

/**
 * @covers \PHPUnit\Event\Run\BeforeRun
 */
final class BeforeRunTest extends TestCase
{
    public function testTypeIsBeforeRun(): void
    {
        $event = new BeforeRun(new Run());

        self::assertTrue($event->type()->is(new GenericType('before-run')));
    }

    public function testConstructorSetsValues(): void
    {
        $run = new Run();

        $event = new BeforeRun($run);

        self::assertSame($run, $event->run());
    }
}
