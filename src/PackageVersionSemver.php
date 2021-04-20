<?php

declare(strict_types=1);

namespace MZNX\ComposerPackageSemver;

use MZNX\ComposerPackageVersion\PackageVersion;
use Version\Exception\InvalidVersionString;
use Version\Version;

class PackageVersionSemver
{
    private string $pathToComposerJson;

    private ?Version $version = null;

    private static ?PackageVersionSemver $instance = null;

    private function __construct(string $pathToComposerJson)
    {
        $this->pathToComposerJson = $pathToComposerJson;
    }

    private function __clone()
    {
    }

    public static function init(string $pathToComposerJson): PackageVersionSemver
    {
        if (self::$instance === null || self::$instance->pathToComposerJson !== $pathToComposerJson) {
            self::$instance = new self($pathToComposerJson);
        }

        return self::$instance;
    }

    /**
     * @throws InvalidVersionString
     */
    public function getVersion(): ?Version
    {
        if (null === $this->version) {
            $version = PackageVersion::init($this->pathToComposerJson)->getVersion();
            $this->version = Version::fromString($version);
        }

        return $this->version;
    }

    public function getVersionAsString(): string
    {
        return PackageVersion::init($this->pathToComposerJson)->getVersion();
    }
}
