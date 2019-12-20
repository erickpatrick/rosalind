<?php declare(strict_types=1);

require __DIR__ . './../vendor/autoload.php';

use Acme\Revc;
use PHPUnit\Framework\TestCase;

class RevcTest extends TestCase 
{
    /**
    * @dataProvider dnaProvider
    */
    public function testComplementingStrandDNA($input, $expected)
    {
        $this->assertEquals(
            (new Revc())->complementingStrandDNA($input),
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