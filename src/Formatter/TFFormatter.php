<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

use function preg_match;
use function str_starts_with;

/**
 * Validates and formats postcodes in French Southern and Antarctic Territories.
 *
 * French codes in the 98400 range have been reserved, but do not seem to be in use at the moment.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
final class TFFormatter implements CountryPostcodeFormatter
{
    public function hint(): string
    {
        return 'French codes in the 98400 range have been reserved, but do not seem to be in use at the moment.';
    }

    public function format(string $postcode): ?string
    {
        if (preg_match('/^[0-9]{5}$/', $postcode) !== 1) {
            return null;
        }

        if (! str_starts_with($postcode, '984')) {
            return null;
        }

        return $postcode;
    }
}
