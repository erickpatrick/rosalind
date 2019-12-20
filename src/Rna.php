<?php namespace Acme;

class Rna 
{
    public function transcribeDNAIntoRNA($input)
    {
        return str_replace('T', 'U', $input);
    }
}