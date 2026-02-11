<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Override;

/**
 * Validates and formats postcodes in Saint Pierre and Miquelon.
 *
 * This country uses a single postcode, 97500.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
final class PMFormatter implements CountryPostcodeFormatter
{
    #[Override]
    public function format(string $postcode): ?string
    {
        if ($postcode === '97500') {
            return $postcode;
        }

        return null;
    }
}
