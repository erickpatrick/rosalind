<?php
  require 'vendor/autoload.php';

  use Acme\Rna;

	class RnaTest extends PHPUnit_Framework_TestCase {

    private $rna;

    public function setUp()
    {
      $this->rna = new Rna();
    }

    /**
     * @dataProvider dnaProvider
     */
    public function testTranscribeDNAIntoRNA($input, $expected)
    {
      $this->assertEquals(
        $this->rna->transcribeDNAIntoRNA($input),
        $expected
      );
    }

    public function dnaProvider()
    {
      return [
        ["GATGGAACTTGACTACGTAAATT", "GAUGGAACUUGACUACGUAAAUU"]
      ];
    }

  }