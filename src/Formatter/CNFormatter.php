<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

use function preg_match;

/**
 * Validates and formats postcodes in China.
 *
 * China Post uses a six-digit all-numerical system, without separator.
 * The range 000000–009999 is not in use.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes_in_China
 */
final class CNFormatter implements CountryPostcodeFormatter
{
    public function hint(): string
    {
        return 'China Post uses a six-digit all-numerical system, without separator.';
    }

    public function format(string $postcode): ?string
    {
        if (preg_match('/^[0-9]{6}$/', $postcode) !== 1) {
            return null;
        }

        if ($postcode[0] === '0' && $postcode[1] === '0') {
            return null;
        }

        return $postcode;
    }
}
