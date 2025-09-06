<?php

declare(strict_types=1);

namespace Brick\Postcode\FormatHelper;

use function strlen;
use function substr;

/**
 * Strip country code prefix from postalcode if it is valid.
 *
 * In some countries like Belgium or Luxembourg its common to provide a country code prefix in a postalcode,
 * Although the format is incorrect, many government agencies, businesses and people still use this.
 * Rather than failing this format into an exception, this helper class strips the prefix off before validating it,
 * Thus providing you with the correct format without the country code prefix in it.
 *
 * @internal
 *
 * @see https://en.wikipedia.org/wiki/Postal_codes_in_Belgium
 */
trait StripPrefix
{
    public function stripPrefix(string $postcode, string $prefix): string
    {
        $prefixLength = strlen($prefix);

        if (substr($postcode, 0, $prefixLength) === $prefix) {
            $postcode = substr($postcode, $prefixLength);
        }

        return $postcode;
    }
}
