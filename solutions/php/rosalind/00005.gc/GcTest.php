<?php
require '../vendor/autoload.php';

use Acme\Gc;

class GcTest extends PHPUnit_Framework_TestCase {
	private $gc;
  private $dna = ">Rosalind_6404 CCTGCGGAAGATCGGCACTAGAATAGCCAGAACCGTTTCTCTGAGGCTTCCGGCCTTCCCTCCCACTAATAATTCTGAGG>Rosalind_5959 CCATCGGTAGCGCATCCTTAGTCCAATTAAGTCCCTATCCAGGCGCTCCGCCGAAGGTCTATATCCATTTGTCAGCAGACACGC>Rosalind_0808 CCACCCTCGTGGTATGGCTAGGCATTCAGGAACCGGAGAACGCTTCAGACCAGCCCGGACTGGGAACCTGCGGGCAGTAGGTGGAAT";
  private $beforeGcContent = [
    1 => [
      "Rosalind_6404",
      "CCTGCGGAAGATCGGCACTAGAATAGCCAGAACCGTTTCTCTGAGGCTTCCGGCCTTCCCTCCCACTAATAATTCTGAGG"
    ],
    2 => [
      "Rosalind_5959",
      "CCATCGGTAGCGCATCCTTAGTCCAATTAAGTCCCTATCCAGGCGCTCCGCCGAAGGTCTATATCCATTTGTCAGCAGACACGC"
    ],
    3 => [
      "Rosalind_0808",
      "CCACCCTCGTGGTATGGCTAGGCATTCAGGAACCGGAGAACGCTTCAGACCAGCCCGGACTGGGAACCTGCGGGCAGTAGGTGGAAT"
    ]
  ];

    public function setUp()
    {
      $this->gc = new Gc();
    }

    /**
     * @dataProvider dataProviderProper
     */
    public function testProperDataset($input, $expected)
    {
      $this->assertEquals(
        $this->gc->properDataset($input),
        $expected
      );
    }

    /**
     * @dataProvider dataProviderGc
     */
    public function testGcContent($input, $expected)
    {
      $this->assertEquals(
        $this->gc->gcContent($input),
        $expected
      );
    }

    /**
     * @dataProvider dataProviderCGCC
     */
    public function testComputingGCContent($input, $expected)
    {
      $this->assertEquals(
        $this->gc->computingGCContent($input),
        $expected
      );
    }

    public function dataProviderProper()
    {
      return [
        [$this->dna, $this->beforeGcContent]
      ];
    }

    public function dataProviderGc()
    {
      return [
        [$this->beforeGcContent[1][1], 53.75],
        [$this->beforeGcContent[2][1], 53.571428571428569],
        [$this->beforeGcContent[3][1], 60.919540229885058]
      ];
    }

    public function dataProviderCGCC()
    {
      return [
        [
          $this->dna,
          [
            1 => [
              $this->beforeGcContent[1][0],
              $this->beforeGcContent[1][1],
              53.75
            ],
            2 => [
              $this->beforeGcContent[2][0],
              $this->beforeGcContent[2][1],
              53.571428571428569
            ],
            3 => [
              $this->beforeGcContent[3][0],
              $this->beforeGcContent[3][1],
              60.919540229885058
            ],
          ]
        ]
      ];
    }
}

