<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Override;

/**
 * Validates and formats postcodes in Falkland Islands.
 *
 * This country uses a single postcode for all addresses.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
final class FKFormatter implements CountryPostcodeFormatter
{
    #[Override]
    public function format(string $postcode): ?string
    {
        if ($postcode === 'FIQQ1ZZ') {
            return 'FIQQ 1ZZ';
        }

        return null;
    }
}
