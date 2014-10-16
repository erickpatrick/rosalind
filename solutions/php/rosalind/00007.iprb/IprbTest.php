<?php require '../vendor/autoload.php';

use Acme\Iprb;

/**
 * Class IprbTest
 */
class IprbTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var
     */
    public $iprb;

    /**
     * @dataProvider dnaProvider
     */
    public function setUp($k, $m, $n)
    {
        $this->iprb = new Iprb($k, $m, $n);
    }

    /**
     * @return array
     */
    public function dnaProvider()
    {
        return [2, 2, 2];
    }
}