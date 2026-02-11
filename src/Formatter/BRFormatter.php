<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Override;

use function preg_match;
use function substr;

/**
 * Validates and formats postcodes in Brazil.
 *
 * Format is 5 digits, hyphen, 3 digits.
 * The old format that used 5 digits is not accepted by this formatter.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 * @see https://en.wikipedia.org/wiki/C%C3%B3digo_de_Endere%C3%A7amento_Postal
 */
final class BRFormatter implements CountryPostcodeFormatter
{
    #[Override]
    public function format(string $postcode): ?string
    {
        if (preg_match('/^[0-9]{8}$/', $postcode) !== 1) {
            return null;
        }

        return substr($postcode, 0, 5) . '-' . substr($postcode, 5);
    }
}
