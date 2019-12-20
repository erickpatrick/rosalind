<?php declare(strict_types=1);

require __DIR__ . './../vendor/autoload.php';

use Acme\Iprb;
use PHPUnit\Framework\TestCase;

/**
* Class IprbTest
*/
class IprbTest extends TestCase
{
    /**
    * @return array
    */
    public function dnaProvider()
    {
        return [2, 2, 2];
    }
}