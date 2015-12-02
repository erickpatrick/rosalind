<?php namespace Acme;

class Gc 
{
    public function gcContent($input) {
        $input = str_split($input);
        $counter = array_count_values($input);
        $inputCounter = count($input);

        return ((($counter['G'] + $counter['C']) / $inputCounter) * 100);
    }

    public function properDataset($input) {
        $dataset = [];

        $input = explode(">", $input);
        foreach ($input as $i) {
            $dataset[] = explode(" ", $i);
        }
        unset($dataset[0]);

        return $dataset;
    }

    public function computingGCContent($input)
    {
        $dataset = $this->properDataset($input);

        $datasetCounter = count($dataset);

        for ($i = 1; $i <= $datasetCounter; $i += 1) {
            $dataset[$i][] = $this->gcContent($dataset[$i]['1']);
        }

        return $dataset;
    }
}