<?php

declare(strict_types=1);

namespace MZNX\ComposerPackageSemver\Tests;

use InvalidArgumentException;
use MZNX\ComposerPackageSemver\PackageVersionSemver;
use PHPUnit\Framework\TestCase;
use Version\Exception\InvalidVersionString;

class PackageVersionSemverTest extends TestCase
{
    public function test_broken_json(): void
    {
        $sut = PackageVersionSemver::init(__DIR__ . '/fixtures/broken_json_file.json');

        $this->expectException(InvalidArgumentException::class);
        $sut->getVersion();
    }

    public function test_get_version_with_invalid_file_path(): void
    {
        $sut = PackageVersionSemver::init(__DIR__ . '/non-existing/composer/json/path');

        $this->expectException(InvalidArgumentException::class);
        $sut->getVersion();
    }

    public function test_get_version_as_string(): void
    {
        $sut = PackageVersionSemver::init(__DIR__ . '/fixtures/without_version.json');

        self::assertEquals('dev-master', $sut->getVersionAsString());
    }

    public function test_get_version_with_default_value(): void
    {
        $sut = PackageVersionSemver::init(__DIR__ . '/fixtures/without_version.json');

        $this->expectException(InvalidVersionString::class);
        $sut->getVersion();
    }

    public function test_get_version(): void
    {
        $sut = PackageVersionSemver::init(__DIR__ . '/fixtures/with_version.json');

        $version = $sut->getVersion();
        self::assertEquals(1, $version->getMajor());
        self::assertEquals(2, $version->getMinor());
        self::assertEquals(3, $version->getPatch());
    }
}
