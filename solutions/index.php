<?php
  require 'vendor/autoload.php';

  $dna = new Acme\Rna();

  echo $dna->transcribeDNAIntoRNA('GATGGAACTTGACTACGTAAATT');
?>