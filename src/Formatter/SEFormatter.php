<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Sweden.
 *
 * Postcode format is NNN NN.
 * The lowest number is 100 00 and the highest number is 984 99.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 * @see https://en.wikipedia.org/wiki/Postal_codes_in_Sweden
 */
class SEFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (preg_match('/^[0-9]{5}$/', $postcode) !== 1) {
            return null;
        }

        if ($postcode < '10000' || $postcode > '98499') {
            return null;
        }

        return substr_replace($postcode, ' ', 3, 0);
    }
}
