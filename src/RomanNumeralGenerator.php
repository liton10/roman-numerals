<?php

namespace Larowlan\RomanNumeral;

/**
 * Defines a class for generating roman numerals from integers.
 */
class RomanNumeralGenerator {

  /**
   * A lookup array for roman numeral mapping.
   *
   * @var array $symbolToNumberLookup
   */
  private $symbolToNumberLookup = [
    'M'  => 1000,
    'CM' => 900,
    'D'  => 500,
    'CD' => 400,
    'C'  => 100,
    'XC' => 90,
    'L'  => 50,
    'XL' => 40,
    'X'  => 10,
    'IX' => 9,
    'V'  => 5,
    'IV' => 4,
    'I'  => 1
  ];

  /**
   * Generates a roman numeral from an integer.
   *
   * @param int $number
   *   Integer to convert.
   * @param bool $lowerCase
   *   (optional) Pass TRUE to convert to lowercase. Defaults to FALSE.
   *
   * @return string
   *   Roman numeral representing the passed integer.
   */
  public function generate(int $number, bool $lowerCase = FALSE) : string {
    $returnValue = '';
    while ($number > 0) {
      foreach ($this->symbolToNumberLookup as $romanSymbol => $numericValue) {
        // We will pick the closest value and calculate from there.
        if($number >= $numericValue) {
          // We will reduce the number equalling the closest value and will take the symbol. 
          $number -= $numericValue;
          $returnValue .= $romanSymbol;
          break;
        }
      }
    }
    return $lowerCase ? strtolower($returnValue) : $returnValue;
  }
}
