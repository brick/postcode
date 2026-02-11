<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Override;

use function preg_match;

/**
 * Validates and formats postcodes in Maldives.
 *
 * Postcodes consist of 5 digits, without separator.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
final class MVFormatter implements CountryPostcodeFormatter
{
    #[Override]
    public function format(string $postcode): ?string
    {
        if (preg_match('/^[0-9]{5}$/', $postcode) !== 1) {
            return null;
        }

        return $postcode;
    }
}
