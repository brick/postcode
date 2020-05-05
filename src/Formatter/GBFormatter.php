<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats the postcodes in the United Kingdom of Great Britain and Northern Ireland.
 *
 * Postcodes can have six different formats:
 *
 * - A9 9AA
 * - A9A 9AA
 * - A99 9AA
 * - AA9 9AA
 * - AA9A 9AA
 * - AA99 9AA
 *
 * A stands for a capital letter, 9 stands for a digit.
 * Only certain letters are allowed for each position in the postcode.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 * @see https://en.wikipedia.org/wiki/Postcodes_in_the_United_Kingdom
 */
class GBFormatter implements CountryPostcodeFormatter
{
    /**
     * The regular expression patterns, or null if not built yet.
     *
     * @var string[]|null
     */
    private $patterns = null;

    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        // regular patterns
        $patterns = $this->getPatterns();

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $postcode, $matches) === 1) {
                [, $outwardCode, $areaCode, $inwardCode] = $matches;

                // @todo check area code

                return $outwardCode . ' ' . $inwardCode;
            }
        }

        return null;
    }

    /**
     * Builds the regular expression patterns to check the postcode.
     *
     * Each pattern contains 3 capturing groups:
     *
     * - The outward code (e.g. WC2E)
     * - The area code (ex: WC) for additional checks
     * - The inward code (e.g. 9RZ)
     *
     * @return string[]
     */
    private function getPatterns() : array
    {
        if ($this->patterns !== null) {
            return $this->patterns;
        }

        $n = '[0-9]';

        // outward code alpha chars
        $outAlpha1 = '[ABCDEFGHIJKLMNOPRSTUWYZ]';
        $outAlpha2 = '[ABCDEFGHKLMNOPQRSTUVWXY]';
        $outAlpha3 = '[ABCDEFGHJKPSTUW]';
        $outAlpha4 = '[ABEHMNPRVWXY]';

        // inward code alpha chars
        $inAlpha = '[ABDEFGHJLNPQRSTUWXYZ]';

        $outPatterns = [];

        // AN
        $outPatterns[] = '(' . $outAlpha1 . ')' . $n;

        // ANA
        $outPatterns[] = '(' . $outAlpha1 . ')' . $n . $outAlpha3;

        // ANN
        $outPatterns[] = '(' . $outAlpha1 . ')' . $n . $n;

        // AAN
        $outPatterns[] = '(' . $outAlpha1 . $outAlpha2 . ')' . $n;

        // AANA
        $outPatterns[] = '(' . $outAlpha1 . $outAlpha2 . ')' . $n . $outAlpha4;

        // AANN
        $outPatterns[] = '(' . $outAlpha1 . $outAlpha2 . ')' . $n . $n;

        $inPattern = $n . $inAlpha . $inAlpha;

        $patterns = [];

        foreach ($outPatterns as $outPattern) {
            $patterns[] = '/^(' . $outPattern . ')(' . $inPattern . ')$/';
        }

        return $this->patterns = $patterns;
    }
}
