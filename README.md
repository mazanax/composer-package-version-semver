[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.4-8892BF.svg?style=flat-square)](https://php.net/)
[![Latest Stable Version](https://poser.pugx.org/mazanax/composer-version-semver/v/stable)](https://packagist.org/packages/mazanax/composer-version-semver)
[![Build Status](https://api.travis-ci.com/mazanax/composer-package-version-semver.svg?branch=master)](https://travis-ci.com/github/mazanax/composer-package-version-semver)
[![codecov](https://codecov.io/gh/mazanax/composer-package-version-semver/branch/master/graph/badge.svg?token=E1EQHJQJTH)](https://codecov.io/gh/mazanax/composer-package-version-semver)

# Composer Package Version
Helper class to get a current version from `composer.json` file in your project

If you want to get only string version, you can use [mazanax/composer-project-version](https://packagist.org/packages/mazanax/composer-project-version)

## Installation
`composer require mazanax/composer-version-semver`

## Usage

### &bull; Accessing Major/Minor/Patch version
```php
<?php

$packageVersion = \MZNX\ComposerPackageSemver\PackageVersionSemver::init(__DIR__ . '/path/to/composer.json');
$version = $packageVersion->getVersion();

echo $version->getMajor() . PHP_EOL;
echo $version->getMinor() . PHP_EOL;
echo $version->getPatch() . PHP_EOL;
```

### &bull; Getting version as string
```php
<?php

$packageVersion = \MZNX\ComposerPackageSemver\PackageVersionSemver::init(__DIR__ . '/path/to/composer.json');
$version = $packageVersion->getVersionAsString();

echo $version . PHP_EOL;
```

## License

MIT
