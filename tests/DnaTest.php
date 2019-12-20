<?php declare(strict_types=1);

require __DIR__ . './../vendor/autoload.php';

use Acme\Dna;
use PHPUnit\Framework\TestCase;

class DnaTest extends TestCase 
{
    /**
    * @dataProvider dnaProvider
    */
    public function testCountDNANucleotides($input, $expected)
    {
        $this->assertEquals(
            (new Dna())->countDNANucleotides($input),
            $expected
        );
    }

    public function dnaProvider()
    {
        return [
            ["ACGT", "1 1 1 1"],
            ["ACGTACGTACGTACGTACGTACGTACGTACGTACGTACGT", "10 10 10 10"],
            ["AGCTTTTCATTCTGACTGCAACGGGCAATATGTCTCTGTGTGGATTAAAAAAAGAGTGTCTGATAGCAGC", "20 12 17 21"]
        ];
    }
}