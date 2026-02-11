<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Override;

use function preg_match;

/**
 * Validates and formats postcodes in Canary Islands (a subset of Spain).
 *
 * Postcodes consist of 5 digits, without separator,
 * and start with 35 (Las Palmas) or 38 (Santa Cruz de Tenerife).
 *
 * @see https://www.iso.org/obp/ui/#iso:code:3166:IC
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes_in_Spain
 */
final class ICFormatter implements CountryPostcodeFormatter
{
    #[Override]
    public function format(string $postcode): ?string
    {
        if (preg_match('/^(35|38)[0-9]{3}$/', $postcode) !== 1) {
            return null;
        }

        return $postcode;
    }
}
