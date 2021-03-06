<?php 

declare(strict_types=1);

namespace Acme;

class Dna 
{
    public function countDNANucleotides($input)
    {
        $count = array_count_values(str_split($input));
        ksort($count);

        return implode(" ", $count);
    }
}