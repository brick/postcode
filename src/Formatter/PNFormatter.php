<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Pitcairn Islands.
 *
 * This country uses a single postcode for all addresses.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
class PNFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if ($postcode === 'PCRN1ZZ') {
            return 'PCRN 1ZZ';
        }

        return null;
    }
}
