<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Override;

use function array_slice;
use function implode;
use function preg_match;

/**
 * Validates and formats postcodes in Nigeria.
 *
 * The digital postcode NIPOST launched in October 2026 has 11 characters, AA-NN-XXX-AA-NN,
 * where A stands for a letter, N for a digit and X for either. Both numeric segments
 * run from 01 to 99. The former six-digit code is still accepted.
 *
 * @see https://docs.postcode.gov.ng/concepts/postcode-format
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 * @see https://en.wikipedia.org/wiki/Postal_codes_in_Nigeria
 */
final class NGFormatter implements CountryPostcodeFormatter
{
    #[Override]
    public function format(string $postcode): ?string
    {
        if (preg_match('/^[0-9]{6}$/', $postcode) === 1) {
            return $postcode;
        }

        $pattern = '/^([A-Z]{2})(0[1-9]|[1-9][0-9])([A-Z0-9]{3})([A-Z]{2})(0[1-9]|[1-9][0-9])$/';

        if (preg_match($pattern, $postcode, $matches) !== 1) {
            return null;
        }

        return implode('-', array_slice($matches, 1));
    }
}
