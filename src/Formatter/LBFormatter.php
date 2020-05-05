<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Lebanon.
 *
 * Postcode format is NNNN NNNN, where N stands for a digit.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
class LBFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (preg_match('/^[0-9]{8}$/', $postcode) !== 1) {
            return null;
        }

        return substr($postcode, 0, 4) . ' ' . substr($postcode, 4);
    }
}
