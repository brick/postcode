<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

use function preg_match;
use function str_starts_with;
use function substr;

/**
 * Validates and formats postcodes in British Virgin Islands.
 *
 * The postcode format is VG followed by 4 digits, specifically VG1110 through VG1160.
 * This formatter accepts inputs with and without the VG prefix, and always outputs the prefix.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
final class VGFormatter implements CountryPostcodeFormatter
{
    public function hint(): string
    {
        return 'The postcode format is VG followed by 4 digits, specifically VG1110 through VG1160.';
    }

    public function format(string $postcode): ?string
    {
        if (str_starts_with($postcode, 'VG')) {
            $postcode = substr($postcode, 2);
        }

        if (preg_match('/^[0-9]{4}$/', $postcode) !== 1) {
            return null;
        }

        if ($postcode < '1110' || $postcode > '1160') {
            return null;
        }

        return 'VG' . $postcode;
    }
}
