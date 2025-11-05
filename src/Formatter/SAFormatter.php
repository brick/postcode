<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

use function preg_match;
use function strlen;
use function substr;

/**
 * Validates and formats postcodes in Saudi Arabia.
 *
 * The postcode format is NNNNN for PO Boxes and NNNNN-NNNN for home delivery, N standing for a digit.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
final class SAFormatter implements CountryPostcodeFormatter
{
    public function hint(): string
    {
        return 'The postcode format is NNNNN for PO Boxes and NNNNN-NNNN for home delivery, N standing for a digit.';
    }

    public function format(string $postcode): ?string
    {
        if (preg_match('/^[0-9]+$/', $postcode) !== 1) {
            return null;
        }

        $length = strlen($postcode);

        if ($length === 5) {
            return $postcode;
        }

        if ($length === 9) {
            return substr($postcode, 0, 5) . '-' . substr($postcode, -4);
        }

        return null;
    }
}
