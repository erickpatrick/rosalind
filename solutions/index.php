<?php
  require 'vendor/autoload.php';

  $test = new Acme\Hamm();

  echo $test->countingPointMutations("GAGCCTACTAACGGGAT CATCGTAATGACGGCCT");
?>