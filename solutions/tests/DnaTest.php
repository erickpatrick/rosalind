<?php
  require 'vendor/autoload.php';

  use Acme\Dna;

	class DnaTest extends PHPUnit_Framework_TestCase {

    private $dna;

    public function setUp()
    {
      $this->dna = new Dna();
    }

    public function testCountDNANucleotides()
    {
      $this->assertEquals(
        $this->dna->countDNANucleotides("AGCTTTTCATTCTGACTGCAACGGGCAATATGTCTCTGTGTGGATTAAAAAAAGAGTGTCTGATAGCAGC"),
        "20 12 17 21");
    }

  }