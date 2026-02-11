<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Override;

use function preg_match;

/**
 * Validates and formats the postcodes in the Republic of Ireland.
 *
 * Postcodes can have at least the following thirteen different formats:
 *
 * - ANN NNNA
 * - ANN NANN
 * - ANN ANNN
 * - ANN ANNA
 * - ANN ANAN
 * - ANN ANAA
 * - ANN AANN
 * - ANN AANA
 * - ANN AAAN
 *
 * - D6W ANAN
 * - D6W AANN
 * - D6W ANAA
 * - D6W ANNN
 *
 * A stands for the capital letter A,C,D,E,F,H,K,N,P,R,T,V,W,X or Y. N stands for a digit. D6W stans literally for D6W.
 *
 * The first part is one of the 139 Routing Keys, the second is a Unique Identifier.
 * The pdf document linked below defines Eircode's character set on page 11.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 * @see https://en.wikipedia.org/wiki/Postal_addresses_in_the_Republic_of_Ireland
 * @see https://www.eircode.ie/docs/default-source/Common/prepareyourbusinessforeircode-edition3published.pdf
 * @see https://www.autoaddress.ie/support/developer-centre/resources/routing-key-boundaries
 */
final class IEFormatter implements CountryPostcodeFormatter
{
    /**
     * The regular expression pattern used to validate the postcode and extract the two parts.
     */
    private const PATTERN = '/^'
        . '('
        . 'A41|A42|A45|A63|A67|A75|A81|A82|A83|A84|A85|A86|A91|A92|A94|A96|A98|C15|D01|D02|D03|D04|D05|D06|D6W|D07|D08|D09|'
        . 'D10|D11|D12|D13|D14|D15|D16|D17|D18|D20|D22|D24|E21|E25|E32|E34|E41|E45|E53|E91|F12|F23|F26|F28|F31|F35|F42|F45|'
        . 'F52|F56|F91|F92|F93|F94|H12|H14|H16|H18|H23|H53|H54|H62|H65|H71|H91|K32|K34|K36|K45|K56|K67|K78|N37|N39|N41|N91|'
        . 'P12|P14|P17|P24|P25|P31|P32|P36|P43|P47|P51|P56|P61|P67|P72|P75|P81|P85|R14|R21|R32|R35|R42|R45|R51|R56|R93|R95|'
        . 'T12|T23|T34|T45|T56|V14|V15|V23|V31|V35|V42|V92|V93|V94|V95|W12|W23|W34|W91|X35|X42|X91|Y14|Y21|Y25|Y34|Y35'
        . ')'
        . '([ACDEFHKNPRTVWXY0-9]{4})'
        . '$/';

    #[Override]
    public function format(string $postcode): ?string
    {
        if (preg_match(self::PATTERN, $postcode, $matches) !== 1) {
            return null;
        }

        return $matches[1] . ' ' . $matches[2];
    }
}
