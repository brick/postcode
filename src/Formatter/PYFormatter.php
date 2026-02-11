<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Override;

use function preg_match;

/**
 * Validates and formats postcodes in Paraguay.
 *
 * Postcodes consist of 4 digits before June 2018 and 6 digits thereafter, without a separator.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
final class PYFormatter implements CountryPostcodeFormatter
{
    #[Override]
    public function format(string $postcode): ?string
    {
        if (preg_match('/^(?:[0-9]{4}|[0-9]{6})$/', $postcode) !== 1) {
            return null;
        }

        return $postcode;
    }
}
