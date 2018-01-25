<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Canada.
 *
 * The format is ANA NAN, where A is a letter and N is a digit.
 * Postal codes do not include the letters D, F, I, O, Q or U.
 * The first position also does not make use of the letters W or Z.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 * @see https://en.wikipedia.org/wiki/Postal_codes_in_Canada
 */
class CAFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (preg_match('/^([ABCEGHJ-NPRSTV-Z][0-9]){3}$/', $postcode) !== 1) {
            return null;
        }

        if ($postcode[0] === 'W' || $postcode[0] === 'Z') {
            return null;
        }

        return substr($postcode, 0, 3) . ' ' . substr($postcode, 3);
    }
}
