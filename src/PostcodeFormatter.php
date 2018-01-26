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
        if ($cleanup) {
            $postcode = preg_replace('/[^a-zA-Z0-9]/', '', $postcode);
        }

        $formatted = $this->getFormatter($country)->format($postcode);

        if ($formatted === null) {
            throw new InvalidPostcodeException('Invalid postcode: ' . $postcode);
        }

        return $formatted;
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
        $country = strtoupper($country);

        if (! isset($this->formatters[$country])) {
            $class = __NAMESPACE__ . '\\Formatter\\' . $country . 'Formatter';

            if (! class_exists($class)) {
                throw new UnknownCountryException('Unknown country: ' . $country);
            }

            $this->formatters[$country] = new $class();
        }

        return $this->formatters[$country];
    }
}
