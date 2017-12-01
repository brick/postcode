<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Saint Barthélemy.
 *
 * This country uses a single postcode, 97133.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
class BLFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if ($postcode === '97133') {
            return $postcode;
        }

        return null;
    }
}
