<?php

namespace Larowlan\RomanNumeral\Tests;

use Larowlan\RomanNumeral\RomanNumeralGenerator;

/**
 * Defines a class for testing roman numeral generation.
 *
 * @group Unit
 */
class RomanNumeralGeneratorTest extends \PHPUnit_Framework_TestCase {

  /**
   * Generator under test.
   *
   * @var \Larowlan\RomanNumeral\RomanNumeralGenerator
   */
  protected $generator;

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();
    $this->generator = new RomanNumeralGenerator();
  }

  /**
   * Tests roman numeral generation.
   *
   * @dataProvider providerTestGeneration
   */
  public function testGeneration($number, $expected, $isLower) {
    $this->assertEquals($expected, $this->generator->generate($number, $isLower));
  }

  /**
   * Data provider for testGeneration().
   *
   * @return array
   *   Test cases.
   */
  public function providerTestGeneration() {
    // Starting with uppercase test cases. Using string keys for more verbose output in case of broken tests
    $testCases = [
      "I"      => [1, "I", FALSE],
      "II"     => [2, "II", FALSE],
      "III"    => [3, "III", FALSE],
      "IV"     => [4, "IV", FALSE],
      "V"      => [5, "V", FALSE],
      "VI"     => [6, "VI", FALSE],
      "IX"     => [9, "IX", FALSE],
      "XXVII"  => [27, "XXVII", FALSE],
      "XLVIII" => [48, "XLVIII", FALSE],
      "LIX"    => [59, "LIX", FALSE],
      "XCIII"  => [93, "XCIII", FALSE],
      "CXLI"   => [141, "CXLI", FALSE],
      "CLXIII" => [163, "CLXIII", FALSE],
      "CDII"   => [402, "CDII", FALSE],
      "DLXXV"  => [575, "DLXXV", FALSE],
      "CMXI"   => [911, "CMXI", FALSE],
      "MXXIV"  => [1024, "MXXIV", FALSE],
      "MMM"    => [3000, "MMM", FALSE],
    ];
    // Now converting each uppercase test case to lowercase and taking them as test cases.
    foreach ($testCases as $key => $value) {
      $testCases[strtolower($key)] = [$value[0], strtolower($value[1]), TRUE]; 
    }
    return $testCases;
  }
}
