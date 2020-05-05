<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Norfolk Island.
 *
 * Postcodes consist of 4 digits, without separator.
 * Part of the Australian postal code system.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
class NFFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (preg_match('/^[0-9]{4}$/', $postcode) !== 1) {
            return null;
        }

        return $postcode;
    }
}
