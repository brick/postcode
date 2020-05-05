<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Costa Rica.
 *
 * Postal codes in Costa Rica are 5 digit numeric.
 * According to Wikipedia, street level format is 5 digits, dash, 4 digits.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 * @see https://en.wikipedia.org/wiki/List_of_districts_of_Costa_Rica
 */
class CRFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (preg_match('/^[0-9]+$/', $postcode) !== 1) {
            return null;
        }

        $length = strlen($postcode);

        if ($length === 5) {
            return $postcode;
        }

        if ($length !== 9) {
            return null;
        }

        return substr($postcode, 0, 5) . '-' . substr($postcode, 5);
    }
}
