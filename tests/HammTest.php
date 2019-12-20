<?php declare(strict_types=1);

require __DIR__ . './../vendor/autoload.php';

use Acme\Hamm;
use PHPUnit\Framework\TestCase;

class HammTest extends TestCase 
{
    /**
    * @dataProvider dataProviderCPM
    */
    public function testCountingPointMutations($input, $expected)
    {
        $this->assertEquals(
            (new Hamm())->countingPointMutations($input),
            $expected
        );
    }

    public function dataProviderCPM()
    {
        return [
            ["GAGCCTACTAACGGGAT" . PHP_EOL . "CATCGTAATGACGGCCT", 7]
        ];
    }
}