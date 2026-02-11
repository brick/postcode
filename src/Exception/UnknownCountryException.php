<?php

declare(strict_types=1);

namespace Brick\Postcode\Exception;

/**
 * Exception thrown when trying to format a postcode with an unknown country code.
 */
final class UnknownCountryException extends PostcodeException
{
    public function __construct(
        private readonly string $country,
    ) {
        parent::__construct('Unknown country: ' . $country);
    }

    /**
     * Returns the ISO country code used to format the postcode.
     */
    public function getCountry(): string
    {
        return $this->country;
    }
}
