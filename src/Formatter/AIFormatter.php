<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Anguilla.
 *
 * Anguilla uses a single postcode for all addresses.
 */
class AIFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if ($postcode !== 'AI2640') {
            return null;
        }

        return 'AI-2640';
    }
}
