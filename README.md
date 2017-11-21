# Brick\Postcode

<img src="https://raw.githubusercontent.com/brick/brick/master/logo.png" alt="" align="left" height="64">

A PHP library to validate and format postcodes.

[![Build Status](https://secure.travis-ci.org/brick/postcode.svg?branch=master)](http://travis-ci.org/brick/postcode)
[![Coverage Status](https://coveralls.io/repos/brick/postcode/badge.svg?branch=master)](https://coveralls.io/r/brick/postcode?branch=master)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](http://opensource.org/licenses/MIT)

## Introduction

This library can currently format and validate postcodes for the following countries:

- `FR` France
- `GB` United Kingdom
- `PL` Poland
- `RE` Réunion island
- `US` United States

Contributions are welcome: feel free to open a pull request to add a formatter for another country.

## Installation

This library is installable via [Composer](https://getcomposer.org/).

```json
{
    "require": {
        "brick/postcode": "dev-master"
    }
}
```

## Requirements

This library requires PHP 7.1 or later.

## Quick start

```php
use Brick\Postcode\PostcodeFormatter;

$formatter = new PostcodeFormatter();

$formatter->isValidPostcode('GB', 'ABCDEFG'); // false
$formatter->isValidPostcode('GB', 'WC2E9RZ'); // true

$formatter->format('GB', 'WC2E9RZ'); // WC2E 9RZ
$formatter->format('US', '337014313'); // 33701-4313
```

Calling `format()` on an invalid postcode throws an [InvalidPostcodeException](https://github.com/brick/postcode/blob/master/src/InvalidPostcodeException.php).