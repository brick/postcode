<?php

declare(strict_types=1);

namespace Brick\Postcode;

/**
 * Formats and validates postcodes.
 */
class PostcodeFormatter
{
    /**
     * The postcode formatters, indexed by country code.
     *
     * @var CountryPostcodeFormatter[]
     */
    private $formatters = [];

    /**
     * @param string $country  The 2-letter ISO 3166-1 alpha-2 country code.
     * @param string $postcode The postcode to validate.
     * @param bool   $cleanup  Whether to clean up non-alphanumeric characters from the postcode prior to validation.
     *                         This allows the formatter to accept (potentially improperly) formatted postcodes.
     *                         By default, the postcode is expected to be unformatted, without any separator.
     *
     * @return bool
     *
     * @throws UnknownCountryException
     */
    public function isValidPostcode(string $country, string $postcode, bool $cleanup = false) : bool
    {
        return $this->doFormatPostcode($country, $postcode, $cleanup) !== null;
    }

    /**
     * @param string $country  The ISO 3166-1 alpha-2 country code.
     * @param string $postcode The postcode to format.
     * @param bool   $cleanup  Whether to clean up non-alphanumeric characters from the postcode prior to validation.
     *                         This allows the formatter to accept (potentially improperly) formatted postcodes.
     *                         By default, the postcode is expected to be unformatted, without any separator.
     *
     * @return string
     *
     * @throws InvalidPostcodeException
     * @throws UnknownCountryException
     */
    public function formatPostcode(string $country, string $postcode, bool $cleanup = false) : string
    {
        $formatted = $this->doFormatPostcode($country, $postcode, $cleanup);

        if ($formatted === null) {
            throw new InvalidPostcodeException('Invalid postcode: ' . $postcode);
        }

        return $formatted;
    }

    /**
     * @param string $country
     * @param string $postcode
     * @param bool   $cleanup
     *
     * @return string|null
     *
     * @throws UnknownCountryException
     */
    private function doFormatPostcode(string $country, string $postcode, bool $cleanup) : ?string
    {
        if ($cleanup) {
            $postcode = preg_replace('/[^a-zA-Z0-9]/', '', $postcode);
        }

        return $this->getFormatter($country)->format($postcode);
    }

    /**
     * @param string $country
     *
     * @return CountryPostcodeFormatter
     *
     * @throws UnknownCountryException
     */
    private function getFormatter(string $country) : CountryPostcodeFormatter
    {
        if (! isset($this->formatters[$country])) {
            $class = __NAMESPACE__ . '\\Formatter\\' . $country;

            if (! class_exists($class)) {
                throw new UnknownCountryException('Unknown country: ' . $country);
            }

            $this->formatters[$country] = new $class();
        }

        return $this->formatters[$country];
    }
}
