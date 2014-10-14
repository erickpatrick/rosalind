<?php ini_set('error_reporting', E_ALL);

//namespace Acme;

class Iprb {
  // zygotus
  private $k = 'AA';
  private $m = 'Aa';
  private $n = 'aa';

  private $breeders    = [];
  private $descendants = [];

  public function __construct($k, $m, $n)
  {
    $this->fillBasePopulation($k, 'k');
    $this->fillBasePopulation($m, 'm');
    $this->fillBasePopulation($n, 'n');
  }

  public function probabilityDominant()
  {
    $totals = $this->breedersDescendants();
    return 1 - ($totals['aa'] / count($this->descendants));
  }

  private function fillBasePopulation($multiplier, $zygotus)
  {
    for ($i = 1; $i <= $multiplier; $i += 1) {
      $this->breeders[] = $this->$zygotus;
    }
  }

  private function breedersDescendants()
  {
    $breedersCount = count($this->breeders);

    for ($i = 0; $i < $breedersCount; $i += 1) {
      for ($j = 0; $j < $breedersCount; $j += 1) {
        if ($i == $j) continue;
        $this->generateDescendants($this->breeders[$i], $this->breeders[$j]);
      }
    }

    return array_count_values($this->descendants);
  }

  private function generateDescendants($x, $y)
  {
    $this->descendants[] = $x[0].$y[0];
    $this->descendants[] = $x[0].$y[1];
    $this->descendants[] = $x[1].$y[0];
    $this->descendants[] = $x[1].$y[1];
  }
}


//$iprb = new Iprb(2,2,2);
//echo $iprb->probabilityDominant();
?>