<?php require __DIR__ . '/../vendor/autoload.php';

use Acme\Prot;

class ProtTest extends PHPUnit_Framework_TestCase 
{
    /** @var Acme\Prot $prot */
    private $prot;

    public function setUp()
    {
        $this->prot = new Prot();
    }

    /**
    * @dataProvider dataProviderSampleInput
    */
    public function testTranslateRnaIntoProteinWithSampleInput($sampleRna, $sampleResult)
    {
        $this->assertEquals(
            $this->prot->translateRnaIntoProtein($sampleRna), 
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