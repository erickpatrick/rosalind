<?php require __DIR__ . '/../vendor/autoload.php';

use Acme\Fib;

class FibTest extends PHPUnit_Framework_TestCase 
{
    private $fib;

    public function setUp()
    {
        $this->fib = new Fib();
    }

    /**
    * @dataProvider dataProvider
    */
    public function testRabbitsRecurrenceRelations($n, $k, $expected)
    {
        $this->assertEquals(
            $this->fib->rabbitsRecurrenceRelations($n, $k),
            $expected
        );
    }

    public function dataProvider()
    {
        return [
            [5, 3, 19],
            [6, 3, 40]
        ];
    }
}