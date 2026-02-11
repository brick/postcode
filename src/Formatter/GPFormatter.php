<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Override;

use function preg_match;

/**
 * Validates and formats postcodes in Guadeloupe.
 *
 * Postcode format is 971NN, where N stands for a digit.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
final class GPFormatter implements CountryPostcodeFormatter
{
    #[Override]
    public function format(string $postcode): ?string
    {
        if (preg_match('/^971[0-9]{2}$/', $postcode) !== 1) {
            return null;
        }

        return $postcode;
    }
}
