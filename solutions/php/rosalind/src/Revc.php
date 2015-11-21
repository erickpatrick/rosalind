<?php namespace Acme;

class Revc {
    public function complementingStrandDNA($input)
    {
        return strtr(
            strrev($input), 
            ["A" => "T", "C" => "G", "G" => "C", "T" => "A"]
        );
    }
}