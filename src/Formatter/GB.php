<?php

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
 *
 * The first part is called the outcode, the second part is called the incode.
 */
class GB implements CountryPostcodeFormatter
{
    /**
     * The regular expression pattern used to validate the postcode and extract the outcode and incode.
     *
     * @var string
     */
    private $pattern;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->pattern = '/^'
            . '('
            . '(?:[A-Z][0-9])|'
            . '(?:[A-Z][0-9][A-Z])|'
            . '(?:[A-Z][0-9][0-9])|'
            . '(?:[A-Z][A-Z][0-9])|'
            . '(?:[A-Z][A-Z][0-9][A-Z])|'
            . '(?:[A-Z][A-Z][0-9][0-9])'
            . ')'
            . '([0-9][A-Z][A-Z])'
            . '$/';
    }

    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (preg_match($this->pattern, strtoupper($postcode), $matches) !== 1) {
            return null;
        }

        return $matches[1] . ' ' . $matches[2];
    }
}
