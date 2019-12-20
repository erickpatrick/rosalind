<?php  

declare(strict_types=1);

namespace Acme;

/**
 * Usage:
 * 
 * $input = '';
 * $test = new Cons();
 * 
 * $profileMatrix = $test->getProfileMatrix($input);
 * $consensusString = $test->getConsensusString($profileMatrix);
 * 
 * echo $test->getConsensusString($profileMatrix) . PHP_EOL;
 * echo $test->printProfileMatrix($profileMatrix);
 */
class Cons
{
    public function getProfileMatrix(string $input): array
    {
        $dnas = $this->getDnas($input);
        $dnaSize = count($dnas[0] ?? '');
        $profileMatrix = [];

        for ($i = 0; $i < $dnaSize; $i += 1) {
            $profileMatrix[] = array_count_values(array_column($dnas, $i));
        }

        return $profileMatrix;
    }

    public function getConsensusString(array $profileMatrix): string
    {
        $consensus = '';

        foreach ($profileMatrix as $position) {
            $consensus .= array_flip($position)[max($position)];
        }

        return $consensus;
    }

    public function printProfileMatrix(array $profileMatrix): string
    {
        $symbols = ['A', 'C', 'G', 'T'];
        $final = array_reduce($profileMatrix, function ($split, $item) use ($symbols) {
            foreach ($symbols as $symbol) {
                $split[$symbol][] = $item[$symbol] ?? 0;
            }
        
            return $split;
        }, []);

        $toPrint = '';
        foreach ($final as $key => $value) {
            $toPrint .= $key . ': ' . implode(' ', $value) . PHP_EOL;
        }

        return $toPrint;
    }

    private function getDnas(string $input): array
    {
        return array_filter(array_map(
            // removes spaces from both ends and merge lines for each string
            fn ($dna) => str_split(trim(preg_replace('/\n/', '', $dna))),
            // slipt where each dns string starts and remove empty entries
            preg_split('/(>Rosalind_[0-9]+)/', $input, -1, PREG_SPLIT_NO_EMPTY)
        ));
    }
}
