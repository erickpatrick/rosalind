<?php require __DIR__ . '/../vendor/autoload.php';

use Acme\Subs;
use Acme\Helper\Dna;

class SubsTest extends PHPUnit_Framework_TestCase 
{
    /** @var Acme\Prot $prot */
    private $subs;

    public function setUp()
    {
        $dnaHelper = new Dna();
        $this->subs = new Subs($dnaHelper);
    }

    /**
    * @dataProvider dataProviderSampleInput
    */
    public function testFindAllMotifsInDna($rnaString, $rnaSubstring, $sampleResult)
    {
        $this->assertEquals(
            $this->subs->findAllMotifsInDna($rnaString, $rnaSubstring),
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