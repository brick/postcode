<?php

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
     *
     * @return bool
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
     */
    public function formatPostcode(string $country, string $postcode) : string
    {
        $postcode = $this->doFormatPostcode($country, $postcode);

        if ($postcode === null) {
            throw new InvalidPostcodeException();
        }

        return $postcode;
    }

    /**
     * @param string $country
     * @param string $postcode
     *
     * @return string|null
     */
    private function doFormatPostcode(string $country, string $postcode) : ?string
    {
        $postcode = preg_replace('/[^a-zA-Z0-9]/', '', $postcode);

        return $this->getFormatter($country)->format($postcode);
    }

    /**
     * @param string $country
     *
     * @return CountryPostcodeFormatter
     *
     * @throws \InvalidArgumentException
     */
    private function getFormatter(string $country) : CountryPostcodeFormatter
    {
        if (! isset($this->formatters[$country])) {
            $class = __NAMESPACE__ . '\\Formatter\\' . $country;

            if (! class_exists($class)) {
                throw new \InvalidArgumentException('Unknown country.');
            }

            $this->formatters[$country] = new $class();
        }

        return $this->formatters[$country];
    }
}
