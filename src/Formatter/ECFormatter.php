<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Override;

use function preg_match;

/**
 * Validates and formats postcodes in Ecuador.
 *
 * Postal codes in Ecuador have six numeric digits.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 * @see https://en.wikipedia.org/wiki/Postal_codes_in_Ecuador
 */
final class ECFormatter implements CountryPostcodeFormatter
{
    #[Override]
    public function format(string $postcode): ?string
    {
        if (preg_match('/^[0-9]{6}$/', $postcode) !== 1) {
            return null;
        }

        return $postcode;
    }
}
