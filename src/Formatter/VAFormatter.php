<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Override;

/**
 * Validates and formats postcodes in Vatican.
 *
 * Single code used for all addresses. Part of the Italian postal code system.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
final class VAFormatter implements CountryPostcodeFormatter
{
    #[Override]
    public function format(string $postcode): ?string
    {
        if ($postcode === '00120') {
            return $postcode;
        }

        return null;
    }
}
