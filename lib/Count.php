<?php

namespace lib;

class Count
{
    /**
     * Tablica z symbolami
     *
     * @var array
     */
    const ARRAY_SYMBOLS = [
        self::ROOT,
        self::POWERADE,
        self::DIVISION,
        self::MULTIPLICATION,
        self::SUBTRACTION,
        self::ADDITION
    ];

    /**
     * @var string symbol dodawania
     */
    const ADDITION = '+';

    /**
     * @var string symbol odejmowania
     */
    const SUBTRACTION = '-';

    /**
     * @var string symbol mnozenia
     */
    const MULTIPLICATION = '*';

    /**
     * @var string symbol dzielenia
     */
    const DIVISION = '/';

    /**
     * @var string symbol potegowania
     */
    const POWERADE = '^';

    /**
     * @var string symbol pierwiastkowania
     */
    const ROOT = 'V';

    /**
     * Glowna metoda, odpowiada za pobranie ciagu, oraz przetworzenia wszystkiego, az do pelnego wyniku.
     *
     * @param string $mathString
     *
     * @return float wynik
     *
     * @throws Exception wyjatek
     */
    public function count(string $mathString = '0')
    {
        $array = $this->convertMathStringToArray($mathString);

        foreach (self::ARRAY_SYMBOLS as $symbol) {
            while (in_array($symbol, $array)) {
                $array = array_values($this->switchOperations($array, $symbol));
            }
        }

        return round((float)$array[0], 6);
    }

    /**
     * Konwerter sluzacy do zmapowania do tablicy ciagu znakow z operacjami matematycznimy.
     *
     * @param string $mathString ciąg operacji matemacznych
     *
     * @return array tablica znakow i wartości do przeliczenia
     *
     * @throws Exception wyjatek
     */
    public function convertMathStringToArray(string $mathString): array
    {
        $varNumbers = [];
        $varChars = [];
        $positionChar = 0;
        $positionNumber = 0;
        $mathStringArray = str_split($mathString);
        foreach ($mathStringArray as $value) {
            if (is_numeric($value)) {
                if (isset($varNumbers[$positionNumber - 1])) {
                    $varNumbers[$positionNumber - 1] = $varNumbers[$positionNumber - 1] . $value;
                } else {
                    $varNumbers[$positionNumber] = $value;
                    $positionNumber++;
                    $positionChar++;
                }
            } elseif (in_array($value, [self::SUBTRACTION, self::ADDITION, self::MULTIPLICATION, self::DIVISION, self::POWERADE, self::ROOT])) {
                $varChars[$positionChar] = $value;
                $positionNumber++;
                $positionChar++;
            }
        }
        $arrayNew = $varNumbers + $varChars;

        for ($i = 0; $i < count($arrayNew); $i++) {
            $arrayNew2[$i] = $arrayNew[$i];
        }

        return $arrayNew2 ?? [];
    }

    /**
     * Metoda jest odpowiedzialna za przetworzenie tablicy, wykrycie danej operacji i zwrocenie tablicy z przetworzona operacja.
     *
     * @param array $array tablica do przetworzenia
     * @param string $char znak ktory jest przetwarzany
     *
     * @return array
     *
     * @throws Exception
     */
    public function switchOperations(array $array, string $char): array
    {
        for ($i = 0; $i < count($array); $i++) {
            if ($array[$i] === $char) {
                switch ($char) {
                    case self::ROOT:
                        $array[$i - 1] = Operations::root((float)$array[$i - 1], (float)$array[$i + 1]);
                        break;
                    case self::POWERADE:
                        $array[$i - 1] = Operations::powerade((float)$array[$i - 1], (float)$array[$i + 1]);
                        break;
                    case self::DIVISION:
                        $array[$i - 1] = Operations::division((float)$array[$i - 1], (float)$array[$i + 1]);
                        break;
                    case self::MULTIPLICATION:
                        $array[$i - 1] = Operations::multiplication((float)$array[$i - 1], (float)$array[$i + 1]);
                        break;
                    case self::ADDITION:
                        $array[$i - 1] = Operations::addittion((float)$array[$i - 1], (float)$array[$i + 1]);
                        break;
                    case self::SUBTRACTION:
                        $array[$i - 1] = Operations::subtraction((float)$array[$i - 1], (float)$array[$i + 1]);
                        break;
                }
                unset($array[$i]);
                unset($array[$i + 1]);

                return $array;
            }
        }

        return $array;
    }
}