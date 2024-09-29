<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Romania.
 *
 * Postal codes have six digits and no separator.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 * @see https://en.wikipedia.org/wiki/Postal_codes_in_Romania
 */
class ROFormatter implements CountryPostcodeFormatter
{
    public function format(string $postcode) : ?string
    {
        if (preg_match('/^(01|02|03|04|05|06|07|08|09|10|11|12|13|14|15|16|17|18|19|20|21|22|23|24|25|26|27|28|29|30|31|32|33|34|35|36|37|38|39|40|41|42|43|44|45|50|51|52|53|54|55|60|61|62|70|71|72|73|80|81|82|90|91|92)[0-9]{4}$/', $postcode) !== 1) {
            return null;
        }

        return $postcode;
    }
}
