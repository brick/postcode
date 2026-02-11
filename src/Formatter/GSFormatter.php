<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Override;

/**
 * Validates and formats postcodes in South Georgia and the South Sandwich Islands.
 *
 * This country uses a single postcode for all addresses.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
final class GSFormatter implements CountryPostcodeFormatter
{
    #[Override]
    public function format(string $postcode): ?string
    {
        if ($postcode === 'SIQQ1ZZ') {
            return 'SIQQ 1ZZ';
        }

        return null;
    }
}
