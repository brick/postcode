<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

use function preg_match;
use function strlen;
use function substr;

/**
 * Validates and formats postcodes in Micronesia.
 *
 * U.S. ZIP codes. Range 96941 - 96944.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
final class FMFormatter implements CountryPostcodeFormatter
{
    public function hint(): string
    {
        return 'U.S. ZIP codes. Range 96941 - 96944.';
    }

    public function format(string $postcode): ?string
    {
        if (preg_match('/^[0-9]+$/', $postcode) !== 1) {
            return null;
        }

        $length = strlen($postcode);

        if ($length === 5) {
            $zip = $postcode;
        } elseif ($length === 9) {
            $zip = substr($postcode, 0, 5);
        } else {
            return null;
        }

        if ($zip < '96941' || $zip > '96944') {
            return null;
        }

        if ($length === 5) {
            return $postcode;
        }

        return $zip . '-' . substr($postcode, 5);
    }
}
