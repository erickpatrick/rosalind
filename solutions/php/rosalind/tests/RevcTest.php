<?php require __DIR__ . '../vendor/autoload.php';

use Acme\Revc;

class RevcTest extends PHPUnit_Framework_TestCase {
    private $revc;

    public function setUp()
    {
        $this->revc = new Revc();
    }

    /**
    * @dataProvider dnaProvider
    */
    public function testComplementingStrandDNA($input, $expected)
    {
        $this->assertEquals(
            $this->revc->complementingStrandDNA($input),
            $expected
        );
    }

    public function dnaProvider()
    {
        return [
            ["AAAACCCGGT", "ACCGGGTTTT"]
        ];
    }
}