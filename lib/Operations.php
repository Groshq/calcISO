<?php

namespace lib;
class Operations
{
    /**
     * Metoda na dodawanie
     *
     * @param float $firstNumber pierwsza liczba
     * @param float $secondNumber druga liczba
     *
     * @return float wynik dzialania
     */
    public static function addittion(float $firstNumber, float $secondNumber)
    {
        return ($firstNumber + $secondNumber);
    }

    /**
     * Metoda na odejmowania
     *
     * @param float $firstNumber pierwsza liczba
     * @param float $secondNumber druga liczba
     *
     * @return float wynik dzialania
     */
    public static function subtraction(float $firstNumber, float $secondNumber)
    {
        return $firstNumber - $secondNumber;
    }

    /**
     * Metoda na mnozenie
     *
     * @param float $firstNumber pierwsza liczba
     * @param float $secondNumber druga liczba
     *
     * @return float wynik dzialania
     */
    public static function multiplication(float $firstNumber, float $secondNumber)
    {
        return $firstNumber * $secondNumber;
    }

    /**
     * Metoda na dzielenie
     *
     * @param float $firstNumber pierwsza liczba
     * @param float $secondNumber druga liczba
     *
     * @return float wynik dzialania
     *
     * @throws Exception wyjatek w razie dzielenia przez 0
     */
    public static function division(float $firstNumber, float $secondNumber)
    {
        if ($secondNumber === 0.0) {
            throw new Exception('Division by zero');
        }

        return $firstNumber / $secondNumber;
    }

    /**
     * Metoda na potegowanie
     *
     * @param float $firstNumber pierwsza liczba
     * @param float $secondNumber druga liczba
     *
     * @return float wynik dzialania
     */
    public static function powerade(float $firstNumber, float $secondNumber)
    {
        return pow($firstNumber, $secondNumber);
    }

    /**
     * Metoda na pierwiastkowanie dowolnego stopnia
     *
     * @param float $firstNumber pierwsza liczba
     * @param float $secondNumber druga liczba
     *
     * @return float wynik dzialania
     */
    public static function root(float $firstNumber, float $secondNumber)
    {
        return pow($secondNumber, (1 / $firstNumber));
    }
}
