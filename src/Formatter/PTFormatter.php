<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Override;

use function preg_match;
use function substr;

/**
 * Validates and formats postcodes in Portugal.
 *
 * Postcode format is NNNN-NNN, N standing for a digit.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 * @see https://en.wikipedia.org/wiki/Postal_codes_in_Portugal
 */
final class PTFormatter implements CountryPostcodeFormatter
{
    #[Override]
    public function format(string $postcode): ?string
    {
        if (preg_match('/^[0-9]{7}$/', $postcode) !== 1) {
            return null;
        }

        return substr($postcode, 0, 4) . '-' . substr($postcode, 4);
    }
}
