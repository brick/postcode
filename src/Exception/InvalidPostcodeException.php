<?php

declare(strict_types=1);

namespace Brick\Postcode\Exception;

/**
 * Exception thrown when trying to format an invalid postcode.
 */
final class InvalidPostcodeException extends PostcodeException
{
    public function __construct(
        private readonly string $postcode,
        private readonly string $country,
    ) {
        parent::__construct('Invalid postcode: ' . $postcode);
    }

    /**
     * Returns the invalid postcode that triggered this exception.
     */
    public function getPostcode(): string
    {
        return $this->postcode;
    }

    /**
     * Returns the ISO country code used to format the postcode.
     */
    public function getCountry(): string
    {
        return $this->country;
    }
}
