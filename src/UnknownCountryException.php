<?php

declare(strict_types=1);

namespace Brick\Postcode;

/**
 * Exception thrown when an unknown country code is provided.
 */
final class UnknownCountryException extends \Exception
{
    protected string $country;

    /**
     * Construct exception thrown when an unknown country code is provided.
     *
     * @param string $country
     */
    public function __construct(string $country)
    {
        parent::__construct('Unknown country: ' . $country);
        $this->country = $country;
    }

    /**
     * Get the unknown country ISO2 code associated with this exception.
     *
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }
}
