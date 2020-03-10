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

use PHPUnit\Event\Telemetry\Info;
use PHPUnit\Event\Telemetry\Snapshot;
use PHPUnit\Event\Telemetry\System;
use PHPUnit\Framework;
use PHPUnit\TextUI;

final class DispatchingEmitter implements Emitter
{
    /** @var Dispatcher */
    private $dispatcher;

    /** @var System */
    private $system;

    /** @var Snapshot */
    private $startSnapshot;

    /** @var Snapshot */
    private $previousSnapshot;

    public function __construct(Dispatcher $dispatcher, System $system)
    {
        $this->dispatcher = $dispatcher;
        $this->system     = $system;

        $this->startSnapshot    = $system->snapshot();
        $this->previousSnapshot = $system->snapshot();
    }

    public function applicationConfigured(): void
    {
        $this->dispatcher->dispatch(new Application\Configured($this->telemetryInfo()));
    }

    public function applicationStarted(array $argv, bool $exit): void
    {
        $this->dispatcher->dispatch(new Application\Started(
            $this->telemetryInfo(),
            $argv,
            $exit
        ));
    }

    public function assertionMade(): void
    {
        $this->dispatcher->dispatch(new Assertion\Made($this->telemetryInfo()));
    }

    public function bootstrapFinished(): void
    {
        $this->dispatcher->dispatch(new Bootstrap\Finished($this->telemetryInfo()));
    }

    public function bootstrapStarted(): void
    {
    }

    public function comparatorRegistered(): void
    {
        $this->dispatcher->dispatch(new Comparator\Registered($this->telemetryInfo()));
    }

    public function configurationLoaded(TextUI\Configuration\Configuration $configuration): void
    {
        $this->dispatcher->dispatch(new Configuration\Loaded(
            $this->telemetryInfo(),
            $configuration
        ));
    }

    public function extensionLoaded(): void
    {
        $this->dispatcher->dispatch(new Extension\Loaded($this->telemetryInfo()));
    }

    public function globalStateCaptured(): void
    {
        $this->dispatcher->dispatch(new GlobalState\Captured($this->telemetryInfo()));
    }

    public function globalStateModified(): void
    {
        $this->dispatcher->dispatch(new GlobalState\Modified($this->telemetryInfo()));
    }

    public function globalStateRestored(): void
    {
        $this->dispatcher->dispatch(new GlobalState\Restored($this->telemetryInfo()));
    }

    public function testCaseRunSkippedWithWarning(Framework\TestCase $testCase, \Throwable $warning): void
    {
        $this->dispatcher->dispatch(new TestCase\RunSkippedWithWarning(
            $this->telemetryInfo(),
            $testCase,
            $warning
        ));
    }

    public function testRunConfigured(): void
    {
        $this->dispatcher->dispatch(new Test\RunConfigured($this->telemetryInfo()));
    }

    public function testRunErrored(): void
    {
        $this->dispatcher->dispatch(new Test\RunErrored($this->telemetryInfo()));
    }

    public function testRunFailed(): void
    {
        $this->dispatcher->dispatch(new Test\RunFailed($this->telemetryInfo()));
    }

    public function testRunFinished(): void
    {
        $this->dispatcher->dispatch(new Test\RunFinished($this->telemetryInfo()));
    }

    public function testRunIncomplete(Framework\Test $test, Framework\IncompleteTest $error, bool $stopOnIncomplete): void
    {
    }

    public function testRunPassed(): void
    {
        $this->dispatcher->dispatch(new Test\RunPassed($this->telemetryInfo()));
    }

    public function testRunRisky(): void
    {
        $this->dispatcher->dispatch(new Test\RunRisky($this->telemetryInfo()));
    }

    public function testRunSkipped(Framework\Test $test, Framework\SkippedTest $error, bool $stopOnSkipped): void
    {
    }

    public function testRunSkippedByDataProvider(): void
    {
        $this->dispatcher->dispatch(new Test\RunSkippedByDataProvider($this->telemetryInfo()));
    }

    public function testRunSkippedIncomplete(): void
    {
        $this->dispatcher->dispatch(new Test\RunSkippedIncomplete($this->telemetryInfo()));
    }

    public function testRunSkippedWithFailedRequirements(): void
    {
        $this->dispatcher->dispatch(new Test\RunSkippedWithFailedRequirements($this->telemetryInfo()));
    }

    public function testRunSkippedWithWarning(): void
    {
        $this->dispatcher->dispatch(new Test\RunSkippedWithWarning($this->telemetryInfo()));
    }

    public function testRunWithOutput(Framework\Test $test, Framework\OutputError $error, bool $stopOnRisky, bool $stopOnDefect): void
    {
        $this->dispatcher->dispatch(new Test\RunWithOutput(
            $this->telemetryInfo(),
            $test,
            $error,
            $stopOnRisky,
            $stopOnDefect
        ));
    }

    public function testSetUpFinished(): void
    {
        $this->dispatcher->dispatch(new Test\SetUpFinished($this->telemetryInfo()));
    }

    public function testTearDownFinished(): void
    {
        $this->dispatcher->dispatch(new Test\TearDownFinished($this->telemetryInfo()));
    }

    public function testCaseAfterClassFinished(): void
    {
        $this->dispatcher->dispatch(new TestCase\AfterClassFinished($this->telemetryInfo()));
    }

    public function testCaseBeforeClassFinished(): void
    {
        $this->dispatcher->dispatch(new TestCase\BeforeClassFinished($this->telemetryInfo()));
    }

    public function testCaseSetUpBeforeClassFinished(): void
    {
        $this->dispatcher->dispatch(new TestCase\SetUpBeforeClassFinished($this->telemetryInfo()));
    }

    public function testCaseSetUpFinished(): void
    {
        $this->dispatcher->dispatch(new TestCase\SetUpFinished($this->telemetryInfo()));
    }

    public function testCaseTearDownAfterClassFinished(): void
    {
        $this->dispatcher->dispatch(new TestCase\TearDownAfterClassFinished($this->telemetryInfo()));
    }

    public function testDoubleMockCreated(): void
    {
        $this->dispatcher->dispatch(new TestDouble\MockCreated($this->telemetryInfo()));
    }

    public function testDoubleMockForTraitCreated(): void
    {
        $this->dispatcher->dispatch(new TestDouble\MockForTraitCreated($this->telemetryInfo()));
    }

    public function testDoublePartialMockCreated(): void
    {
        $this->dispatcher->dispatch(new TestDouble\PartialMockCreated($this->telemetryInfo()));
    }

    public function testDoubleProphecyCreated(): void
    {
        $this->dispatcher->dispatch(new TestDouble\ProphecyCreated($this->telemetryInfo()));
    }

    public function testDoubleTestProxyCreated(): void
    {
        $this->dispatcher->dispatch(new TestDouble\TestProxyCreated($this->telemetryInfo()));
    }

    public function testSuiteAfterClassFinished(): void
    {
        $this->dispatcher->dispatch(new TestSuite\AfterClassFinished($this->telemetryInfo()));
    }

    public function testSuiteBeforeClassFinished(): void
    {
        $this->dispatcher->dispatch(new TestSuite\BeforeClassFinished($this->telemetryInfo()));
    }

    public function testSuiteConfigured(): void
    {
        $this->dispatcher->dispatch(new TestSuite\Configured($this->telemetryInfo()));
    }

    public function testSuiteLoaded(): void
    {
        $this->dispatcher->dispatch(new TestSuite\Loaded($this->telemetryInfo()));
    }

    public function testSuiteRunFailed(Framework\TestSuite $testSuite, \Throwable $error): void
    {
    }

    public function testSuiteRunFinished(Framework\TestSuite $testSuite): void
    {
        $this->dispatcher->dispatch(new TestSuite\RunFinished(
            $this->telemetryInfo(),
            $testSuite
        ));
    }

    public function testSuiteRunStarted(Framework\TestSuite $testSuite): void
    {
        $this->dispatcher->dispatch(new TestSuite\RunStarted(
            $this->telemetryInfo(),
            $testSuite
        ));
    }

    public function testSuiteSorted(): void
    {
        $this->dispatcher->dispatch(new TestSuite\Sorted($this->telemetryInfo()));
    }

    private function telemetryInfo(): Info
    {
        $current = $this->system->snapshot();

        $info = new Info(
            $current,
            $current->time()->diff($this->startSnapshot->time()),
            $current->memoryUsage()->diff($this->startSnapshot->memoryUsage()),
            $current->time()->diff($this->previousSnapshot->time()),
            $current->memoryUsage()->diff($this->previousSnapshot->memoryUsage())
        );

        $this->previousSnapshot = $current;

        return $info;
    }
}
