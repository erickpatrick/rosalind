<?php require __DIR__ . '/../vendor/autoload.php';

use Acme\Dna;

class DnaTest extends PHPUnit_Framework_TestCase 
{

    private $dna;

    public function setUp()
    {
        $this->dna = new Dna();
    }

    /**
    * @dataProvider dnaProvider
    */
    public function testCountDNANucleotides($input, $expected)
    {
        $this->assertEquals(
            $this->dna->countDNANucleotides($input),
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