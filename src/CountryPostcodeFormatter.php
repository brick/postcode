<?php

declare(strict_types=1);

namespace Brick\Postcode;

/**
 * Validates and formats postcodes for a country.
 *
 * If the implementation defines a constructor, this must not take any parameters.
 */
interface CountryPostcodeFormatter
{
    /**
     * Validates and formats the given postcode.
     *
     * @param string $postcode The postcode to format, as a string of alphanumeric characters with no separator.
     *
     * @return string|null The formatted postcode, or NULL if the postcode is invalid.
     */
    public function format(string $postcode) : ?string;
}
