<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in French Southern and Antarctic Territories.
 *
 * Postcode format is 984NN, where N stands for a digit.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
class TFFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (! ctype_digit($postcode)) {
            return null;
        }

        if (strlen($postcode) !== 5) {
            return null;
        }

        if (substr($postcode, 0, 3) !== '984') {
            return null;
        }

        return $postcode;
    }
}
