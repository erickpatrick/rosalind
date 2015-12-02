<?php namespace Acme;

class Prot 
{
    private $rnaCodonsTable = [
        'F' => ['UUU', 'UUC'],
        'L' => ['UUA', 'UUG', 'CUU', 'CUC', 'CUA', 'CUG'],
        'S' => ['UCU', 'UCC', 'UCA', 'UCG', 'AGU', 'AGC'],
        'Y' => ['UAU', 'UAC'],
        'C' => ['UGU', 'UGC'],
        'W' => ['UGG'],
        'P' => ['CCU', 'CCC', 'CCA', 'CCG'],
        'H' => ['CAU', 'CAC'],
        'Q' => ['CAA', 'CAG'],
        'R' => ['CGU', 'CGC', 'CGA', 'CGG', 'AGA', 'AGG'],
        'I' => ['AUU', 'AUC', 'AUA'],
        'M' => ['AUG'],
        'T' => ['ACU', 'ACC', 'ACA', 'ACG'],
        'N' => ['AAU', 'AAC'],
        'K' => ['AAA', 'AAG'],
        'V' => ['GUU', 'GUC', 'GUA', 'GUG'],
        'A' => ['GCU', 'GCC', 'GCA', 'GCG'],
        'D' => ['GAU', 'GAC'],
        'E' => ['GAA', 'GAG'],
        'G' => ['GGU', 'GGC', 'GGA', 'GGG'],
    ];

    private $stopTable = ['UAA', 'UAG', 'UGA'];

    /**
     * Translates given RNA string into a propert protein
     * 
     * @param string $rnaString
     * @return string
     * @throws InvalidArgumentException
     */
    public function translateRnaIntoProtein($rnaString)
    {
        $protein = [];

        if ($this->isValidmRna($rnaString)) {
            $rnaCodons = str_split($rnaString, 3);

            foreach ($rnaCodons as $rnaCodon) {
                if ($this->isStopCondition($rnaCodon)) {
                    break;
                }

                $protein[] = $this->getAminoacid($rnaCodon);
            }
        } else {
            throw new \InvalidArgumentException('Invalid argument');
        }

        return implode("", $protein);
    }

    /**
     * Verifies if given strand of RNA is a valid messenger RNA by checking its size
     * 
     * @param string $rnaString
     * @return bool
     */
    private function isValidmRna($rnaString)
    {
        $numberOfNucleotides = strlen($rnaString);

        return ($numberOfNucleotides / 2 < 10000);
    }

    /**
     * Verifies if given codon is a stop condition to terminate RNA translation into protein
     * 
     * @param string $rnaCodon
     * @return bool
     */
    private function isStopCondition($rnaCodon)
    {
        return in_array($rnaCodon, $this->stopTable);
    }

    /**
     * Searches through codons table and returns proper aminoacid for given codon
     * 
     * @param string $rnaString
     * @return string
     */
    private function getAminoacid($rnaCodon)
    {
        $selectedAminoacidTable = array_filter(
            $this->rnaCodonsTable, 
            function($rnaCodons, $aminoacid) use ($rnaCodon) {
                return in_array($rnaCodon, $rnaCodons);
            }, 
            ARRAY_FILTER_USE_BOTH
        );

        $aminoacid = array_keys($selectedAminoacidTable)[0];

        return $aminoacid;
    }
}