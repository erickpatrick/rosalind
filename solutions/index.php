<?php
  require 'vendor/autoload.php';

  $dna = new Acme\Dna();

  echo $dna->countDNANucleotides('acgt');
?>