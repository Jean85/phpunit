<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Event\Telemetric;

class SysInfo
{
    /** @var Clock */
    private $clock;

    /** @var MemoryMeter */
    private $memoryMeter;

    public function __construct(Clock $clock, MemoryMeter $memoryMeter)
    {
        $this->clock       = $clock;
        $this->memoryMeter = $memoryMeter;
    }

    public function snapshot(): Snapshot
    {
        return new SnapShot(
            $this->clock->now(),
            $this->memoryMeter->usage(),
            $this->memoryMeter->peak()
        );
    }
}
