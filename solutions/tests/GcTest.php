<?php
require 'vendor/autoload.php';

use Acme\Gc;

class GcTest extends PHPUnit_Framework_TestCase {
	private $gc;

    public function setUp()
    {
      $this->gc = new Gc();
    }

    /**
     * @dataProvider dataProvider
     */
    public function testComputingGCContent($input, $proper, $gcContent, $expected)
    {
      $this->assertEquals(
        $this->gc->computingGCContent($input),
        $expected
      );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testProperDataset($input, $proper, $gcContent, $expected)
    {
      $this->assertEquals(
        $this->gc->properDataset($input),
        $proper
      );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testProperDataset($input, $proper, $gcContent, $expected)
    {
      $this->assertEquals(
        $this->gc->gcContent($proper[0][1]),
        $gcContent
      );
    }

    public function dataProvider()
    {
      return [
        [
        	">Rosalind_6404 CCTGCGGAAGATCGGCACTAGAATAGCCAGAACCGTTTCTCTGAGGCTTCCGGCCTTCCCTCCCACTAATAATTCTGAGG>Rosalind_5959 CCATCGGTAGCGCATCCTTAGTCCAATTAAGTCCCTATCCAGGCGCTCCGCCGAAGGTCTATATCCATTTGTCAGCAGACACGC>Rosalind_0808 CCACCCTCGTGGTATGGCTAGGCATTCAGGAACCGGAGAACGCTTCAGACCAGCCCGGACTGGGAACCTGCGGGCAGTAGGTGGAAT", 
        	[
        		[1] => [
        			[0] => "Rosaling_6404",
        			[1] => "CCTGCGGAAGATCGGCACTAGAATAGCCAGAACCGTTTCTCTGAGGCTTCCGGCCTTCCCTCCCACTAATAATTCTGAGG"
        		],
        		[2] => [
        			[0] => "Rosalind_5959",
        			[1] => "CCATCGGTAGCGCATCCTTAGTCCAATTAAGTCCCTATCCAGGCGCTCCGCCGAAGGTCTATATCCATTTGTCAGCAGACACGC"
        		],
        		[3] => [
        			[0] => "Rosalind_0808",
        			[1] => "CCACCCTCGTGGTATGGCTAGGCATTCAGGAACCGGAGAACGCTTCAGACCAGCCCGGACTGGGAACCTGCGGGCAGTAGGTGGAAT"
        		]
        	],
        	53.75,
        	[
        		[1] => [
        			[0] => "Rosaling_6404",
        			[1] => "CCTGCGGAAGATCGGCACTAGAATAGCCAGAACCGTTTCTCTGAGGCTTCCGGCCTTCCCTCCCACTAATAATTCTGAGG",
        			53.75
        		],
        		[2] => [
        			[0] => "Rosalind_5959",
        			[1] => "CCATCGGTAGCGCATCCTTAGTCCAATTAAGTCCCTATCCAGGCGCTCCGCCGAAGGTCTATATCCATTTGTCAGCAGACACGC",
        			53.571428571429
        		],
        		[3] => [
        			[0] => "Rosalind_0808",
        			[1] => "CCACCCTCGTGGTATGGCTAGGCATTCAGGAACCGGAGAACGCTTCAGACCAGCCCGGACTGGGAACCTGCGGGCAGTAGGTGGAAT",
        			60.919540229885
        		]
        	]

        ]
      ];
    }
}

