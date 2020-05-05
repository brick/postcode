<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Saint Pierre and Miquelon.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
class PMFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (preg_match('/^975[0-9]{2}$/', $postcode) === 1) {
            return $postcode;
        }

        return null;
    }
}
