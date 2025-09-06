<?php

declare(strict_types=1);

namespace Brick\Postcode;

use Exception;

/**
 * Exception thrown when trying to format an invalid postcode.
 */
final class InvalidPostcodeException extends Exception
{
    protected string $postcode;

    protected string $country;

    /**
     * Construct exception thrown when trying to format an invalid postcode.
     */
    public function __construct(string $postcode, string $country)
    {
        parent::__construct('Invalid postcode: ' . $postcode);
        $this->postcode = $postcode;
        $this->country = $country;
    }

    /**
     * Get the invalid postcode associated with this exception.
     */
    public function getPostcode(): string
    {
        return $this->postcode;
    }

    /**
     * Get the country ISO2 code associated with this exception.
     */
    public function getCountry(): string
    {
        return $this->country;
    }
}
