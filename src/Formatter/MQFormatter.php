<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Martinique.
 *
 * Postcodes consist of 5 digits, without separator.
 * Overseas Department of France. French codes used. Range 97200 - 97290.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
class MQFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (strlen($postcode) !== 5) {
            return null;
        }

        if (! ctype_digit($postcode)) {
            return null;
        }

        if ($postcode < '97200' || $postcode > '97290') {
            return null;
        }

        return $postcode;
    }
}
