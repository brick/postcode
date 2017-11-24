<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in British Indian Ocean Territory.
 *
 * This country uses a single postcode for all addresses.
 */
class IOFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if ($postcode === 'BBND1ZZ') {
            return 'BBND 1ZZ';
        }

        return null;
    }
}
