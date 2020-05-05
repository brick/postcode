<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in the Cayman Islands.
 *
 * Postcode format is KYN-NNNN, where N are digits. The first digit can only be 1 to 3.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 * @see https://en.wikipedia.org/wiki/Postal_codes_in_the_Cayman_Islands
 */
class KYFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (substr($postcode, 0, 2) !== 'KY') {
            return null;
        }

        $postcode = substr($postcode, 2);

        if (preg_match('/^[0-9]{5}$/', $postcode) !== 1) {
            return null;
        }

        if ($postcode[0] < '1' || $postcode[0] > '3') {
            return null;
        }

        return 'KY' . $postcode[0] . '-' . substr($postcode, 1);
    }
}
