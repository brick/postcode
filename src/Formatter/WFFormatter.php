<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Wallis and Futuna.
 *
 * Postcodes consist of 5 digits, without separator.
 * Overseas Collectivity of France. French codes used. Range 98600 - 98690.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
class WFFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (preg_match('/^[0-9]{5}$/', $postcode) !== 1) {
            return null;
        }

        if ($postcode < '98600' || $postcode > '98690') {
            return null;
        }

        return $postcode;
    }
}
