# Brick\Postcode

<img src="https://raw.githubusercontent.com/brick/brick/master/logo.png" alt="" align="left" height="64">

A PHP library to validate and format postcodes.

[![Build Status](https://secure.travis-ci.org/brick/postcode.svg?branch=master)](http://travis-ci.org/brick/postcode)
[![Coverage Status](https://coveralls.io/repos/github/brick/postcode/badge.svg?branch=master)](https://coveralls.io/github/brick/postcode?branch=master)
[![Latest Stable Version](https://poser.pugx.org/brick/postcode/v/stable)](https://packagist.org/packages/brick/postcode)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](http://opensource.org/licenses/MIT)

## Introduction

This library can format and validate postcodes for all countries having a postcode system.

Contributions are welcome, please feel free to open an issue or a pull request if you notice any mistake.

## Installation

This library is installable via [Composer](https://getcomposer.org/):

```bash
composer require brick/postcode
```

## Requirements

This library requires PHP 7.1 or later.

## Project status & release process

This library is still under development.

The current releases are numbered `0.x.y`. When a non-breaking change is introduced (adding new methods, optimizing existing code, etc.), `y` is incremented.

**When a breaking change is introduced, a new `0.x` version cycle is always started.**

It is therefore safe to lock your project to a given release cycle, such as `0.2.*`.

If you need to upgrade to a newer release cycle, check the [release history](https://github.com/brick/postcode/releases) for a list of changes introduced by each further `0.x.0` version.

## How to use it

```php
use Brick\Postcode\PostcodeFormatter;

$formatter = new PostcodeFormatter();

$formatter->format('GB', 'WC2E9RZ'); // WC2E 9RZ
$formatter->format('US', '337014313'); // 33701-4313
```

## Notes

* Postcodes are cleaned from optional separators (spaces and dashes) before validation.
Misplaced or mismatched separators are not considered an error and will be ignored:

  ```php
  $formatter->format('GB', 'WC-2E9RZ'); // WC2E 9RZ
  ```

* If `format()` is called with an unknown country code, an [UnknownCountryException](https://github.com/brick/postcode/blob/master/src/UnknownCountryException.php) is thrown:

  ```php
  $formatter->format('XX', '12345'); // UnknownCountryException
  ```

  Note that a country with no postcode system is considered as unknown, even if the country code is a valid ISO 3166 code.

* If `format()` is called with an invalid postcode for the given country, an [InvalidPostcodeException](https://github.com/brick/postcode/blob/master/src/InvalidPostcodeException.php) is thrown:

  ```php
  $formatter->format('GB', 'ABCDEFG'); // InvalidPostcodeException
  ```
