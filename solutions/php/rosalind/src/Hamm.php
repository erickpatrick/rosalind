<?php namespace Acme;

class Hamm 
{
    public function compareChars($a, $b) 
    {
        return ($a === $b) ? 1 : 0;
    }

    public function arraysHaveSameLength($arr_a, $arr_b) 
    {
        return count($arr_a) === count($arr_b);
    }

    public function countingPointMutations($input) 
    {
        $input = explode(" ", $input);
        $countInput = strlen($input[0]);
        $numberOfMutations = 0;

        if (!$this->arraysHaveSameLength($input[0], $input[1])) {
            return 'Different size strings';
        }

        for ($i = 0; $i < $countInput; $i += 1) {
            $numberOfMutations += !$this->compareChars($input[0][$i], $input[1][$i]);
        }

        return $numberOfMutations;
    }
}