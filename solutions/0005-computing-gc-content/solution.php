<?php

	function gcContent($input) {
		$inputCounter = strlen($input);
		$counter = 0;

		for ($i = 0; $i < $inputCounter; $i += 1) {
			switch ($input[$i]) {
				case 'G' : $counter += 1; break;
				case 'C' : $counter += 1; break;
			}
		}

		// echo $input . " >> " . $inputCounter . " >> " . $counter . "<br/>"; 

		return (($counter / $inputCounter) * 100);
	}

	function computingGCContent($input)
	{
		$dataset = [];
		$input = explode(">", $input);
		foreach ($input as $i) {
			$set = explode(" ", $i);
			$dataset[] = [
				"name" => $set[0], 
				"sequence" => $set[1], 
				"gc_content" => null
			];
		}

		unset($dataset[0]);
		$datasetCounter = count($dataset);

		for ($i = 1; $i <= $datasetCounter; $i += 1) {
			$dataset[$i]['gc_content'] = gcContent($dataset[$i]['sequence']);
		}

		return $dataset;
	}

	$input = "
	>Rosalind_6404 CCTGCGGAAGATCGGCACTAGAATAGCCAGAACCGTTTCTCTGAGGCTTCCGGCCTTCCCTCCCACTAATAATTCTGAGG
	>Rosalind_5959 CCATCGGTAGCGCATCCTTAGTCCAATTAAGTCCCTATCCAGGCGCTCCGCCGAAGGTCTATATCCATTTGTCAGCAGACACGC>Rosalind_0808 CCACCCTCGTGGTATGGCTAGGCATTCAGGAACCGGAGAACGCTTCAGACCAGCCCGGACTGGGAACCTGCGGGCAGTAGGTGGAAT";
	$dataset = computingGCContent($input);

	foreach ($dataset as $d) {
		echo "<p>{$d['name']}<br/>{$d['gc_content']}";
	}
?>