<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Brick\Postcode\FormatHelper\StripPrefix;
use Override;

use function preg_match;

/**
 * Validates and formats postcodes in Austria.
 *
 * Postcodes consist of 4 digits, without separator. The first digit must be 1-9.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 * @see https://en.wikipedia.org/wiki/Postal_codes_in_Austria
 */
final class ATFormatter implements CountryPostcodeFormatter
{
    use StripPrefix;

    #[Override]
    public function format(string $postcode): ?string
    {
        $postcode = $this->stripPrefix($postcode, 'A');

        if (preg_match('/^[1-9][0-9]{3}$/', $postcode) !== 1) {
            return null;
        }

        return $postcode;
    }
}
