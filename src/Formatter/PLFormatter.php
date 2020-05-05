<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Poland.
 *
 * Postcodes consist of 5 digits in the following format: xy-zzz.
 *
 * - The first digit represents the postal district
 * - The second digit represents the major geographical subdivision of this district
 * - The three digits after the dash represents the post office, or in the case of large cities,
 *   a particular street, part of the street or even separate address.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
class PLFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (preg_match('/^[0-9]{5}$/', $postcode) !== 1) {
            return null;
        }

        return substr($postcode, 0, 2) . '-' . substr($postcode, 2);
    }
}
