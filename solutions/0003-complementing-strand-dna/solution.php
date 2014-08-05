<?php 
	function complementingStrandDNA($input)
	{
		$input = strrev($input);
		$inputLength = strlen($input);

		for ($i = 0; $i < $inputLength; $i += 1) {
			switch ($input[$i]) {
				case 'A' : $input[$i] = 'T'; break;
				case 'C' : $input[$i] = 'G'; break;
				case 'G' : $input[$i] = 'C'; break;
				case 'T' : $input[$i] = 'A'; break;
			}
		}

		return $input;
	}

	$input = "AAAACCCGGT";
	echo complementingStrandDNA($input);
?>