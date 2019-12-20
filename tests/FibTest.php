<?php declare(strict_types=1);

require __DIR__ . './../vendor/autoload.php';

use Acme\Fib;
use PHPUnit\Framework\TestCase;

class FibTest extends TestCase 
{
    /**
    * @dataProvider dataProvider
    */
    public function testRabbitsRecurrenceRelations($n, $k, $expected)
    {
        $this->assertEquals(
            (new Fib())->rabbitsRecurrenceRelations($n, $k),
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