<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Saint Helena, Ascension and Tristan da Cunha.
 *
 * - Saint Helena uses one code STHL 1ZZ
 * - Ascension uses one code ASCN 1ZZ
 * - Tristan da Cunha uses one code TDCU 1ZZ.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
class SHFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if ($postcode === 'STHL1ZZ') {
            return 'STHL 1ZZ';
        }

        if ($postcode === 'ASCN1ZZ') {
            return 'ASCN 1ZZ';
        }

        if ($postcode === 'TDCU1ZZ') {
            return 'TDCU 1ZZ';
        }

        return null;
    }
}
