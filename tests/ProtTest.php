<?php declare(strict_types=1);

require __DIR__ . './../vendor/autoload.php';

use Acme\Prot;
use PHPUnit\Framework\TestCase;

class ProtTest extends TestCase 
{
    /**
    * @dataProvider dataProviderSampleInput
    */
    public function testTranslateRnaIntoProteinWithSampleInput($sampleRna, $sampleResult)
    {
        $this->assertEquals(
            (new Prot())->translateRnaIntoProtein($sampleRna), 
            $sampleResult
        );
    }

    public function dataProviderSampleInput()
    {
        return [
            ['AUGGCCAUGGCGCCCAGAACUGAGAUCAAUAGUACCCGUAUUAACGGGUGA', 'MAMAPRTEINSTRING']
        ];
    }
}