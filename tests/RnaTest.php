<?php declare(strict_types=1);

require __DIR__ . './../vendor/autoload.php';

use Acme\Rna;
use PHPUnit\Framework\TestCase;

class RnaTest extends TestCase 
{
    /**
    * @dataProvider dnaProvider
    */
    public function testTranscribeDNAIntoRNA($input, $expected)
    {
        $this->assertEquals(
            (new Rna())->transcribeDNAIntoRNA($input),
            $expected
        );
    }

    public function dnaProvider()
    {
        return [
            ["GATGGAACTTGACTACGTAAATT", "GAUGGAACUUGACUACGUAAAUU"]
        ];
    }
}