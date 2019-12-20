<?php namespace Acme\Helper;

class Dna {

    /**
     * Check if DNA string has a $max number of base pairs (ATCG)
     *
     * @param string $dnaString
     * @param int $max
     *
     * @return bool
     */
    public function isBiggerThanMaximumKbp($dnaString, $max = 1000)
    {
        $numberOfBasePairs = strlen($dnaString);

        return ($numberOfBasePairs / 2 > $max);
    }
}