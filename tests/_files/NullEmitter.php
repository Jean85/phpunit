<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use PHPUnit\Framework;
use PHPUnit\TextUI;

final class NullEmitter implements \PHPUnit\Event\Emitter
{
    public function applicationConfigured(): void
    {
    }

    public function applicationStarted(array $argv, bool $exit): void
    {
    }

    public function assertionMade(): void
    {
    }

    public function bootstrapFinished(): void
    {
    }

    public function bootstrapStarted(): void
    {
    }

    public function comparatorRegistered(): void
    {
    }

    public function configurationLoaded(TextUI\Configuration\Configuration $configuration): void
    {
    }

    public function extensionLoaded(): void
    {
    }

    public function globalStateCaptured(): void
    {
    }

    public function globalStateModified(): void
    {
    }

    public function globalStateRestored(): void
    {
    }

    public function testRunConfigured(): void
    {
    }

    public function testRunErrored(): void
    {
    }

    public function testRunFailed(): void
    {
    }

    public function testRunFinished(): void
    {
    }

    public function testRunPassed(): void
    {
    }

    public function testRunRisky(): void
    {
    }

    public function testRunSkippedByDataProvider(): void
    {
    }

    public function testRunSkippedIncomplete(): void
    {
    }

    public function testRunSkippedWithFailedRequirements(): void
    {
    }

    public function testRunSkippedWithWarning(): void
    {
    }

    public function testRunStarted(): void
    {
    }

    public function testSetUpFinished(): void
    {
    }

    public function testTearDownFinished(): void
    {
    }

    public function testCaseAfterClassFinished(): void
    {
    }

    public function testCaseBeforeClassFinished(): void
    {
    }

    public function testCaseRunSkippedWithWarning(Framework\TestCase $testCase, \Throwable $warning): void
    {
    }

    public function testCaseRunSkippedWithError(Framework\TestCase $testCase, \Throwable $error): void
    {
    }

    public function testCaseSetUpBeforeClassFinished(): void
    {
    }

    public function testCaseSetUpFinished(): void
    {
    }

    public function testCaseTearDownAfterClassFinished(): void
    {
    }

    public function testDoubleMockCreated(): void
    {
    }

    public function testDoubleMockForTraitCreated(): void
    {
    }

    public function testDoublePartialMockCreated(): void
    {
    }

    public function testDoubleProphecyCreated(): void
    {
    }

    public function testDoubleTestProxyCreated(): void
    {
    }

    public function testSuiteAfterClassFinished(): void
    {
    }

    public function testSuiteBeforeClassFinished(): void
    {
    }

    public function testSuiteConfigured(): void
    {
    }

    public function testSuiteLoaded(): void
    {
    }

    public function testSuiteRunFailed(Framework\TestSuite $suite, \Throwable $error): void
    {
    }

    public function testSuiteRunFinished(): void
    {
    }

    public function testSuiteRunStarted(): void
    {
    }

    public function testSuiteSorted(): void
    {
    }
}
