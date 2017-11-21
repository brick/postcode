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
     * Whether to clean up non-alphanumeric characters from postcodes prior to validation.
     *
     * @var bool
     */
    private $cleanupPostcodes;

    /**
     * Class constructor.
     *
     * @param bool $cleanupPostcodes Whether to clean up non-alphanumeric characters from postcodes prior to validation.
     *                               This allows the formatter to accept (potentially improperly) formatted postcodes.
     */
    public function __construct(bool $cleanupPostcodes = false)
    {
        $this->cleanupPostcodes = $cleanupPostcodes;
    }

    /**
     * @param string $country  The 2-letter ISO 3166-1 alpha-2 country code.
     * @param string $postcode The postcode to validate.
     *
     * @return bool
     *
     * @throws UnknownCountryException
     */
    public function isValidPostcode(string $country, string $postcode) : bool
    {
        return $this->doFormatPostcode($country, $postcode) !== null;
    }

    /**
     * @param string $country  The ISO 3166-1 alpha-2 country code.
     * @param string $postcode The postcode to format.
     *
     * @return string
     *
     * @throws InvalidPostcodeException
     * @throws UnknownCountryException
     */
    public function formatPostcode(string $country, string $postcode) : string
    {
        $formatted = $this->doFormatPostcode($country, $postcode);

        if ($formatted === null) {
            throw new InvalidPostcodeException('Invalid postcode: ' . $postcode);
        }

        return $formatted;
    }

    /**
     * @param string $country
     * @param string $postcode
     *
     * @return string|null
     *
     * @throws UnknownCountryException
     */
    private function doFormatPostcode(string $country, string $postcode) : ?string
    {
        if ($this->cleanupPostcodes) {
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
