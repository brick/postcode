<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Override;

use function preg_match;
use function substr;

/**
 * Validates and formats postcodes in Lebanon.
 *
 * Postcode format is NNNN NNNN, where N stands for a digit.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 * @see https://github.com/brick/postcode/issues/22
 */
final class LBFormatter implements CountryPostcodeFormatter
{
    #[Override]
    public function format(string $postcode): ?string
    {
        if (preg_match('/^[0-9]{4}$/', $postcode) === 1) {
            return $postcode;
        }

        if (preg_match('/^[0-9]{8}$/', $postcode) === 1) {
            return substr($postcode, 0, 4) . ' ' . substr($postcode, 4);
        }

        return null;
    }
}
