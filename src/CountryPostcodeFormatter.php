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
     * The postcode must be a non-empty string of uppercase alphanumeric characters, with no separator.
     *
     * @param string $postcode The postcode to format.
     *
     * @return string|null The formatted postcode, or NULL if the postcode is invalid.
     */
    public function format(string $postcode) : ?string;
}
