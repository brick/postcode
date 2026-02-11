<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Override;

/**
 * Validates and formats postcodes in Turks and Caicos Islands.
 *
 * This country uses a single postcode for all addresses.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
final class TCFormatter implements CountryPostcodeFormatter
{
    #[Override]
    public function format(string $postcode): ?string
    {
        if ($postcode === 'TKCA1ZZ') {
            return 'TKCA 1ZZ';
        }

        return null;
    }
}
