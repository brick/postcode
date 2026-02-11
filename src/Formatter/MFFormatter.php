<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Override;

/**
 * Validates and formats postcodes in Saint Martin.
 *
 * This country uses a single postcode, 97150.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
final class MFFormatter implements CountryPostcodeFormatter
{
    #[Override]
    public function format(string $postcode): ?string
    {
        if ($postcode === '97150') {
            return $postcode;
        }

        return null;
    }
}
