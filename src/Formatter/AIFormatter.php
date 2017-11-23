<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Anguilla.
 *
 * Anguilla uses a single postcode for all addresses.
 * This formatter accepts an empty string, the digits 2640, or the full postcode AI2640.
 */
class AIFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if ($postcode === '' || $postcode === '2640' || $postcode === 'AI2640') {
            return 'AI-2640';
        }

        return null;
    }
}
