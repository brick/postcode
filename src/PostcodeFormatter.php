<?php

declare(strict_types=1);

namespace Brick\Postcode;

/**
 * Formats and validates postcodes.
 */
class PostcodeFormatter
{
    /**
     * The country postcode formatters, indexed by country code.
     *
     * @var CountryPostcodeFormatter[]
     */
    private $formatters = [];

    /**
     * Formats the given postcode.
     *
     * The country code and postcode are case insensitive.
     * The input postcode is allowed to contain space or dash separators, possibly misplaced.
     *
     * @param string $country  The ISO 3166-1 alpha-2 country code.
     * @param string $postcode The postcode to format.
     *
     * @return string
     *
     * @throws UnknownCountryException
     * @throws InvalidPostcodeException
     */
    public function format(string $country, string $postcode) : string
    {
        $postcode = str_replace([' ', '-'], '', $postcode);
        $postcode = strtoupper($postcode);

        $formatter = $this->getFormatter($country);

        if ($formatter === null) {
            throw new UnknownCountryException('Unknown country: ' . $country);
        }

        if (preg_match('/^[A-Z0-9]+$/', $postcode) !== 1) {
            throw new InvalidPostcodeException('Invalid postcode: ' . $postcode);
        }

        $formatted = $formatter->format($postcode);

        if ($formatted === null) {
            throw new InvalidPostcodeException('Invalid postcode: ' . $postcode);
        }

        return $formatted;
    }

    /**
     * @param string $country
     *
     * @return bool
     */
    public function isSupportedCountry(string $country) : bool
    {
        return $this->getFormatter($country) !== null;
    }

    /**
     * @param string $country The ISO 3166-1 alpha-2 country code.
     *
     * @return CountryPostcodeFormatter|null The formatter, or null if the country code is unknown.
     */
    private function getFormatter(string $country) : ?CountryPostcodeFormatter
    {
        if (isset($this->formatters[$country])) {
            return $this->formatters[$country];
        }

        $country = strtoupper($country);

        if (preg_match('/^[A-Z]{2}$/', $country) !== 1) {
            return null;
        }

        $class = __NAMESPACE__ . '\\Formatter\\' . $country . 'Formatter';

        if (! class_exists($class)) {
            return null;
        }

        return $this->formatters[$country] = new $class();
    }
}
