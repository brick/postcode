<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Vatican.
 *
 * Single code used for all addresses. Part of the Italian postal code system.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
class VAFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if ($postcode === '00120') {
            return $postcode;
        }

        return null;
    }
}
