<?php

declare(strict_types=1);

namespace Brick\Postcode;

/**
 * Formats and validates postcodes.
 */
final class PostcodeFormatter
{
    /**
     * The country postcode formatters, indexed by country code.
     *
     * @var array<string, CountryPostcodeFormatter|null>
     */
    private array $formatters = [];

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
            throw new UnknownCountryException($country);
        }

        if (preg_match('/^[A-Z0-9]+$/', $postcode) !== 1) {
            throw new InvalidPostcodeException($postcode, $country);
        }

        $formatted = $formatter->format($postcode);

        if ($formatted === null) {
            throw new InvalidPostcodeException($postcode, $country);
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
        if (array_key_exists($country, $this->formatters)) {
            return $this->formatters[$country];
        }

        return $this->formatters[$country] = $this->doGetFormatter($country);
    }

    private function doGetFormatter(string $country): ?CountryPostcodeFormatter
    {
        $country = strtoupper($country);

        if (preg_match('/^[A-Z]{2}$/', $country) !== 1) {
            return null;
        }

        /** @var class-string<CountryPostcodeFormatter> $class */
        $class = __NAMESPACE__ . '\\Formatter\\' . $country . 'Formatter';

        return class_exists($class) ? new $class() : null;
    }
}
