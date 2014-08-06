<?php
require 'vendor/autoload.php';

use Acme\Gc;

class GcTest extends PHPUnit_Framework_TestCase {
	private $gc;

    public function setUp()
    {
      $this->gc = new Gc();
    }

    /**
     * @dataProvider dataProviderAHSL
     */
    public function testArraysHaveSameLength($input, $proper, $gcContent, $expected)
    {
      $this->assertEquals(
        $this->gc->arraysHaveSameLength($input),
        $expected
      );
    }

    /**
     * @dataProvider dataProviderCC
     */
    public function testCompareChars($input, $proper, $gcContent, $expected)
    {
      $this->assertEquals(
        $this->gc->compareChars($input),
        $proper
      );
    }

    /**
     * @dataProvider dataProviderCPM
     */
    public function testCountingPointMutations($input, $expected)
    {
      $this->assertEquals(
        $this->gc->countingPointMutations($input),
        $expected
      );
    }

    public function dataProviderCPM()
    {
      return [
        ["GAGCCTACTAACGGGAT CATCGTAATGACGGCCT", 7]	
      ];
    }

    public function dataProviderCC()
    {
        return [
            [['A'], ['A'], true],
            [['A'], ['G'], false],
            [['A'], [''], false],
            [['A'], [1], false],
            [['A'], [[]], false],
            [['A'], [(new stdClass)], false],
        ];
    }

    public function dataProviderAHSL()
    {
        return [
            [['A'], ['A'], true],
            [['A'], ['A', 'B'], false],
            [['A'], [], false],
            [[], [], true]
        ];
    }
}

