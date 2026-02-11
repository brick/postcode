<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Override;

use function preg_match;
use function substr;

/**
 * Validates and formats postcodes in Iran.
 *
 * Postcode format is NNNNN NNNNN, where N stands for a digit.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
final class IRFormatter implements CountryPostcodeFormatter
{
    #[Override]
    public function format(string $postcode): ?string
    {
        if (preg_match('/^[0-9]{10}$/', $postcode) !== 1) {
            return null;
        }

        return substr($postcode, 0, 5) . ' ' . substr($postcode, 5);
    }
}
