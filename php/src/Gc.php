<?php

namespace Acme;

class Gc
{
    public function computingGcContent(string $input): string
    {
        $labels = $this->getLabels($input);
        $dnas = $this->getDnas($input);
        $results = $this->calculateGcContent($dnas);

        return $this->getHighestGcContent($labels, $results);
    }

    private function getLabels(string $input): array
    {
        // array_values necessary in order to reset keys to associate
        // them to DNA strings
        return array_values(array_filter(array_map(
            // removes spaces from both ends and remove `>` DNA String name
            fn ($label) => trim(str_replace('>', '', $label)),

            // find DNA String name and remove empty entries
            preg_split('/([CGTA]+)/', $input, -1, PREG_SPLIT_NO_EMPTY)
        )));
    }

    private function getDnas(string $input): array
    {

        return array_filter(array_map(
            // removes spaces from both ends and merge lines for each string
            fn ($dna) => trim(preg_replace('/\n/', '', $dna)),

            // slipt where each dns string starts and remove empty entries
            preg_split('/(>Rosalind_[0-9]+)/', $input, -1, PREG_SPLIT_NO_EMPTY)
        ));
    }

    private function calculateGcContent(array $dnas): array
    {
        $results = [];
        
        foreach ($dnas as $dna) {
            $allSymbols = str_split($dna);
            $countBySymbols = array_count_values($allSymbols);
            $symbolsCounter = count($allSymbols);

            $totalForGandC = $countBySymbols['G'] + $countBySymbols['C'];
            $percentage = (($totalForGandC / $symbolsCounter) * 100);

            // sets max precision to 6 numbers
            $results[] = number_format($percentage, 6);
        }

        // order by highest value keeping keys associated
        arsort($results);

        return $results;
    }

    private function getHighestGcContent(array $labels, array $results): string
    {
        $resultLabel = '';

        // O(1) as it is ordered and we get out of the loop just after the 1st
        // item. We do this as we need to get the key as well in order to grab
        // the label to display in the result
        foreach ($results as $key => $result) {
            $resultLabel = $labels[$key] . PHP_EOL . $result;
            break;
        }

        return $resultLabel;
    }
}
