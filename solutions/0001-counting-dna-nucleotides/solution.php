<?php 
	function countDNANucleotides($input)
	{
		$count = array_count_values(str_split($input));
		ksort($count);

		return implode(" ", $count);
	}


	$input = "AGCTTTTCATTCTGACTGCAACGGGCAATATGTCTCTGTGTGGATTAAAAAAAGAGTGTCTGATAGCAGC";
	echo countDNANucleotides($input);
?>