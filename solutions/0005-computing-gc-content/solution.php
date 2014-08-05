<?php

	function gcContent($input) {
		$input = str_split($input);
		$counter = array_count_values($input);
		$inputCounter = count($input);

		return ((($counter['G'] + $counter['C']) / $inputCounter) * 100);
	}

	function properDataset($input) {
		$dataset = [];
		$input = explode(">", $input);
		foreach ($input as $i) {
			$dataset[] = explode(" ", $i);
		}
		unset($dataset[0]);

		return $dataset;
	}

	function computingGCContent($input)
	{
		$dataset = properDataset($input);
		
		$datasetCounter = count($dataset);

		for ($i = 1; $i <= $datasetCounter; $i += 1) {
			$dataset[$i][] = gcContent($dataset[$i]['1']);
		}

		return $dataset;
	}

	$input = ">Rosalind_6404 CCTGCGGAAGATCGGCACTAGAATAGCCAGAACCGTTTCTCTGAGGCTTCCGGCCTTCCCTCCCACTAATAATTCTGAGG>Rosalind_5959 CCATCGGTAGCGCATCCTTAGTCCAATTAAGTCCCTATCCAGGCGCTCCGCCGAAGGTCTATATCCATTTGTCAGCAGACACGC>Rosalind_0808 CCACCCTCGTGGTATGGCTAGGCATTCAGGAACCGGAGAACGCTTCAGACCAGCCCGGACTGGGAACCTGCGGGCAGTAGGTGGAAT";
	$dataset = computingGCContent($input);

	foreach ($dataset as $d) {
		echo "<p>{$d['0']}<br/>{$d['2']}";
	}
?>