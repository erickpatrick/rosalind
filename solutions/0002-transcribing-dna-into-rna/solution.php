<?php 
	function transcribeDNAIntoRNA($input)
	{
		return str_replace('T', 'U', $input);
	}

	$input = "GATGGAACTTGACTACGTAAATT";
	echo transcribeDNAIntoRNA($input);
?>