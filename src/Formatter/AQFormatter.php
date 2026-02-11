<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Override;

/**
 * Validates and formats postcodes in British Antarctic Territory.
 *
 * This country uses a single postcode for all addresses.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
final class AQFormatter implements CountryPostcodeFormatter
{
    #[Override]
    public function format(string $postcode): ?string
    {
        if ($postcode === 'BIQQ1ZZ') {
            return 'BIQQ 1ZZ';
        }

        return null;
    }
}
