<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

use function preg_match;

/**
 * Validates and formats postcodes in Egypt.
 *
 * Postcodes consist of 5 or 7 digits, without separator.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes_in_Egypt
 * @see https://www.upu.int/UPU/media/upu/PostalEntitiesFiles/addressingUnit/egyEn.pdf
 */
final class EGFormatter implements CountryPostcodeFormatter
{
    public function hint(): string
    {
        return 'Postcodes consist of 5 or 7 digits, without separator.';
    }

    public function format(string $postcode): ?string
    {
        if (preg_match('/^\d{5}(\d{2})?$/', $postcode) !== 1) {
            return null;
        }

        return $postcode;
    }
}
