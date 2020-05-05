<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Puerto Rico.
 *
 * Puerto Rico is allocated the US ZIP codes 00600 to 00799 and 00900 to 00999.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 * @see https://en.wikipedia.org/wiki/Postal_codes_in_Puerto_Rico
 */
class PRFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (preg_match('/^[0-9]+$/', $postcode) !== 1) {
            return null;
        }

        $length = strlen($postcode);

        if ($length === 5) {
            $zip = $postcode;
        } elseif ($length === 9) {
            $zip = substr($postcode, 0, 5);
        } else {
            return null;
        }

        if (! $this->isInRange($zip)) {
            return null;
        }

        if ($length === 5) {
            return $postcode;
        }

        return $zip . '-' . substr($postcode, 5);
    }

    /**
     * @param string $zip
     *
     * @return bool
     */
    private function isInRange(string $zip) : bool
    {
        if ($zip >= '00600' && $zip <= '00799') {
            return true;
        }

        if ($zip >= '00900' && $zip <= '00999') {
            return true;
        }

        return false;
    }
}
