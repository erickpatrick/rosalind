<?php declare(strict_types=1);

require __DIR__ . './../vendor/autoload.php';

use Acme\Subs;
use Acme\Helper\Dna;
use PHPUnit\Framework\TestCase;

class SubsTest extends TestCase 
{
    /**
    * @dataProvider dataProviderSampleInput
    */
    public function testFindAllMotifsInDna($rnaString, $rnaSubstring, $sampleResult)
    {
        $this->assertEquals(
            (new Subs(new Dna()))->findAllMotifsInDna($rnaString, $rnaSubstring),
            $sampleResult
        );
    }

    public function dataProviderSampleInput()
    {
        return [
            ['GATATATGCATATACTT', 'ATAT', "2 4 10"]
        ];
    }
}