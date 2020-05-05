<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in New Caledonia.
 *
 * Overseas Collectivity of France. French codes used. Range 98800 - 98890.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
class NCFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (preg_match('/^[0-9]{5}$/', $postcode) !== 1) {
            return null;
        }

        if ($postcode < '98800' || $postcode > '98890') {
            return null;
        }

        return $postcode;
    }
}
