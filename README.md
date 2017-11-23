# Brick\Postcode

<img src="https://raw.githubusercontent.com/brick/brick/master/logo.png" alt="" align="left" height="64">

A PHP library to validate and format postcodes.

[![Build Status](https://secure.travis-ci.org/brick/postcode.svg?branch=master)](http://travis-ci.org/brick/postcode)
[![Coverage Status](https://coveralls.io/repos/brick/postcode/badge.svg?branch=master)](https://coveralls.io/r/brick/postcode?branch=master)
[![Latest Stable Version](https://poser.pugx.org/brick/postcode/v/stable)](https://packagist.org/packages/brick/postcode)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](http://opensource.org/licenses/MIT)

## Introduction

This library can currently format and validate postcodes for the following countries:

- `CZ` Czechia
- `FR` France
- `GB` United Kingdom
- `PL` Poland
- `RE` Réunion island
- `SK` Slovakia
- `US` United States

Contributions are welcome: feel free to open a pull request to add a formatter for another country.

## Installation

This library is installable via [Composer](https://getcomposer.org/). Just run:

```bash
composer require brick/postcode
```

or manually define the following requirement in your `composer.json` file:

```json
{
    "require": {
        "brick/postcode": "0.1.*"
    }
}
```

## Requirements

This library requires PHP 7.1 or later.

## Project status & release process

This library is under development.

The current releases are numbered `0.x.y`. When a non-breaking change is introduced (adding new methods, optimizing existing code, etc.), `y` is incremented.

**When a breaking change is introduced, a new `0.x` version cycle is always started.**

It is therefore safe to lock your project to a given release cycle, such as `0.1.*`.

If you need to upgrade to a newer release cycle, check the [release history](https://github.com/brick/postcode/releases) for a list of changes introduced by each further `0.x.0` version.

## Quick start

```php
use Brick\Postcode\PostcodeFormatter;

$formatter = new PostcodeFormatter();

$formatter->isValidPostcode('GB', 'ABCDEFG'); // false
$formatter->isValidPostcode('GB', 'WC2E9RZ'); // true

$formatter->format('GB', 'WC2E9RZ'); // WC2E 9RZ
$formatter->format('US', '337014313'); // 33701-4313
```

Calling `format()` with an invalid postcode throws an [InvalidPostcodeException](https://github.com/brick/postcode/blob/master/src/InvalidPostcodeException.php).

Calling `isValidPostcode()` or `format()` with an unknown country code throws an [UnknownCountryException](https://github.com/brick/postcode/blob/master/src/UnknownCountryException.php).
