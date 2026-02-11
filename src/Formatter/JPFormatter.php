<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Override;

use function preg_match;
use function substr;

/**
 * Validates and formats postcodes in Japan.
 *
 * Postcodes format is NNN-NNNN, where N stands for a digit.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 * @see https://en.wikipedia.org/wiki/Postal_codes_in_Japan
 */
final class JPFormatter implements CountryPostcodeFormatter
{
    #[Override]
    public function format(string $postcode): ?string
    {
        if (preg_match('/^[0-9]{7}$/', $postcode) !== 1) {
            return null;
        }

        return substr($postcode, 0, 3) . '-' . substr($postcode, 3);
    }
}
