<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Colombia.
 *
 * Postal codes in Colombia are 6 digit numeric.
 * The first 2 digits represent the department and can range from 00 to 32.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 * @see https://es.wikipedia.org/wiki/Anexo:C%C3%B3digos_postales_de_Colombia
 */
class COFormatter implements CountryPostcodeFormatter
{
    private const DEPARTMENTS = [
        '05', '08', '11', '13',
        '15', '17', '18', '19',
        '20', '23', '25', '27',
        '41', '44', '47', '50',
        '52', '54', '63', '66',
        '68', '70', '73', '76',
        '81', '85', '86', '88',
        '91', '94', '95', '97',
        '99'
    ];

    public function format(string $postcode) : ?string
    {
        if (preg_match('/^\d{2}(?!0000)\d{4}$/', $postcode) !== 1) {
            return null;
        }

        $department = substr($postcode, 0, 2);

        if (!in_array($department, self::DEPARTMENTS, true)) {
            return null;
        }

        return $postcode;
    }
}
