<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in the Netherlands.
 *
 * Postcode format is NNNN AA, where N stands for a digit and A for a letter.
 * The letter combinations 'SS', 'SD' and 'SA' are not used.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 * @see https://en.wikipedia.org/wiki/Postal_codes_in_the_Netherlands
 */
class NLFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (preg_match('/^([0-9]{4})([A-Z]{2})$/', $postcode, $matches) !== 1) {
            return null;
        }

        if (in_array($matches[2], ['SS', 'SD', 'SA'], true)) {
            return null;
        }

        return $matches[1] . ' ' . $matches[2];
    }
}
