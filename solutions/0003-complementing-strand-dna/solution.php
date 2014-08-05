<?php 
	function complementingStrandDNA($input)
	{
		return strtr(strrev($input), ["A" => "T", "C" => "G", "G" => "C", "T" => "A"]);
	}

	$input = "AAAACCCGGT";
	echo complementingStrandDNA($input);
?>