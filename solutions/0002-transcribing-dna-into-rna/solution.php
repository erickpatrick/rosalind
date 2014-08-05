<?php 
	function transcribeDNAIntoRNA($input)
	{
		$inputLength = strlen($input);
		for ($i = 0; $i < $inputLength; $i += 1) {
			if ($input[$i] === 'T') {
				$input[$i] = 'U';
			}
		}

		return $input;
	}

	$input = "GATGGAACTTGACTACGTAAATT";
	echo transcribeDNAIntoRNA($input);
?>