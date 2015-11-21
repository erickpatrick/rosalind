<?php require __DIR__ . '/../vendor/autoload.php';

use Acme\Hamm;

class HammTest extends PHPUnit_Framework_TestCase {
    private $gc;

    public function setUp()
    {
        $this->hamm = new Hamm();
    }

    /**
    * @dataProvider dataProviderAHSL
    */
    public function testArraysHaveSameLength($a, $b, $expected)
    {
        $this->assertEquals(
            $this->hamm->arraysHaveSameLength($a, $b),
            $expected
        );
    }

    /**
    * @dataProvider dataProviderCC
    */
    public function testCompareChars($a, $b, $expected)
    {
        $this->assertEquals(
            $this->hamm->compareChars($a, $b),
            $expected
        );
    }

    /**
    * @dataProvider dataProviderCPM
    */
    public function testCountingPointMutations($input, $expected)
    {
        $this->assertEquals(
            $this->hamm->countingPointMutations($input),
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
            ['A', 'A', true],
            ['A', 'G', false],
            ['A', [''], false],
            ['A', 1, false],
            ['A', [], false],
            ['A', (new stdClass), false],
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