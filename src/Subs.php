<?php namespace Acme;

use Acme\Helper\Dna;

class Subs 
{

    /** Acme\Helper\Dna $dnaHelper */
    private $dnaHelper;

    public function __construct($dnaHelper)
    {
        $this->dnaHelper = $dnaHelper;
    }

    /**
     * Given two DNA string, S and T, find all motifs on S based on T
     *
     * @param string $dnaStringS
     * @param string $dnaStringT
     *
     * @return string
     */
    public function findAllMotifsInDna($dnaStringS, $dnaStringT)
    {
        $motifsLocations = [];
        $sizeOfDnaStringS = strlen($dnaStringS);
        $sizeOfDnaStringT = strlen($dnaStringT);

        if ($this->dnaHelper->isBiggerThanMaximumKbp($dnaStringS) ||
            $this->dnaHelper->isBiggerThanMaximumKbp($dnaStringT)) {
            throw new \InvalidArgumentException("DNA strings must have length at most 1kbp");
        }

        if ($sizeOfDnaStringT > $sizeOfDnaStringS) {
            throw new \InvalidArgumentException("The second DNA string cannot be bigger than the first");
        }

        for ($position = 0; $position <= $sizeOfDnaStringS; $position += 1) {
            // if the remaining characters count is smaller than the substring
            // we should stop searching for other positions
            if ($sizeOfDnaStringS - $position < $sizeOfDnaStringT) {
                break;
            }

            // instead of starting from the beginning of the string again we start from
            // the position of the last motif start position + 1
            $subDnaStringT = substr($dnaStringS, $position);

            // have we found any other motif?
            $locationStart = strpos($subDnaStringT, $dnaStringT);

            // Yoda style to avoid assignments
            // Comparing against false due to strpos return
            if (false !== $locationStart) {
                $motifLocation = $locationStart + $position + 1;
                $motifsLocations[] = $motifLocation;

                // we jump to the start position of the actual motif so, in the next iteration we
                // can start the search from the next position in DNA string S
                $position += $locationStart;
            }
        }

        return implode(" ", $motifsLocations);
    }
}