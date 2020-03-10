<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Event\TestSuite;

use PHPUnit\Event\AbstractEventTestCase;
use PHPUnit\Framework\TestSuite;

/**
 * @covers \PHPUnit\Event\TestSuite\RunFinished
 */
final class RunFinishedTest extends AbstractEventTestCase
{
    public function testConstructorSetsValues(): void
    {
        $telemetryInfo = self::createTelemetryInfo();
        $testSuite     = new TestSuite();

        $event = new RunFinished(
            $telemetryInfo,
            $testSuite
        );

        self::assertSame($telemetryInfo, $event->telemetryInfo());
        self::assertSame($testSuite, $event->testSuite());
    }
}
