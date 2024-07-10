<?php

declare(strict_types=1);

namespace Brick\Postcode\FormatHelper;

/**
 * Strip country code prefix from postalcode if it is valid.
 *
 * In some countries like Belgium or Luxembourg its common to provide a country code prefix in a postalcode,
 * Although the format is incorrect, many government agencies, businesses and people still use this.
 * Rather than failing this format into an exception, this helper class strips the prefix off before validating it,
 * Thus providing you with the correct format without the country code prefix in it.
 *
 * @see https://en.wikipedia.org/wiki/Postal_codes_in_Belgium
 */
trait StripCountryCode
{
    /**
     * @param string $postcode
     * @param int $validCountryCodeLength
     * @return string
     */
    public function stripCountryCode(string $postcode, int $validCountryCodeLength = 1): string
    {
        $code = substr((new \ReflectionClass($this))->getShortName(), 0, $validCountryCodeLength);

        if (substr($postcode, 0, $validCountryCodeLength) === $code) {
            $postcode = substr($postcode, $validCountryCodeLength);
        }

        return $postcode;
    }
}
