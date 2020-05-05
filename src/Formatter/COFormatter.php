<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Colombia.
 *
 * Postal codes in Colombia are 6 digit numeric.
 * The first 2 digits represent the department and can range from 00 to 32.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 * @see https://en.wikipedia.org/wiki/Postal_codes_in_Colombia
 */
class COFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (preg_match('/^[0-9]{6}$/', $postcode) !== 1) {
            return null;
        }

        $department = substr($postcode, 0, 2);

        if ($department > '32') {
            return null;
        }

        return $postcode;
    }
}
