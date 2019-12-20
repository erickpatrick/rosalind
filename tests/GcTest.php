<?php declare(strict_types=1);

require __DIR__ . './../vendor/autoload.php';

use Acme\Gc;
use PHPUnit\Framework\TestCase;

class GcTest extends TestCase 
{    
    /**
    * @dataProvider dataProviderCGCC
    */
    public function testComputingGCContent($input, $expected)
    {
        $this->assertEquals(
            (new Gc())->computingGcContent($input),
            $expected
        );
    }

    public function dataProviderCGCC()
    {
        return [
            [
<<<'DNAS'
>Rosalind_6404
CCTGCGGAAGATCGGCACTAGAATAGCCAGAACCGTTTCTCTGAGGCTTCCGGCCTTCCC
TCCCACTAATAATTCTGAGG
>Rosalind_5959
CCATCGGTAGCGCATCCTTAGTCCAATTAAGTCCCTATCCAGGCGCTCCGCCGAAGGTCT
ATATCCATTTGTCAGCAGACACGC
>Rosalind_0808
CCACCCTCGTGGTATGGCTAGGCATTCAGGAACCGGAGAACGCTTCAGACCAGCCCGGAC
TGGGAACCTGCGGGCAGTAGGTGGAAT
DNAS,
<<<'RESULT'
Rosalind_0808
60.919540
RESULT
            ]
        ];
    }
}