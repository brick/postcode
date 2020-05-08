<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Saint Pierre and Miquelon.
 *
 * This country uses a single postcode, 97500.
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
        if ($postcode === '97500') {
            return $postcode;
        }

        return null;
    }
}
