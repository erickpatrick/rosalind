<?php namespace Acme;

	class Dna {

    public function countDNANucleotides($input)
    {
      $count = array_count_values(str_split($input));
      ksort($count);

      return implode(" ", $count);
    }

  }