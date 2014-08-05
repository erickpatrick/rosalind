<?php
	function compareChars($a, $b) {
		return ($a === $b) ? 1 : 0;
	}

	function arraysHaveSameLength($arr_a, $arr_b) {
		return count($arr_a) === count($arr_b);
	}

	function countingPointMutations($input) {
		$input = explode(" ", $input);
		$countInput = strlen($input[0]);
		$numberOfMutations = 0;

		if (!arraysHaveSameLength($input[0], $input[1])) return 'Cadeias com tamanhos diferentes';

		for ($i = 0; $i < $countInput; $i += 1) {
			$numberOfMutations += !compareChars($input[0][$i], $input[1][$i]);
		}

		return $numberOfMutations;
	}

	$input = "GAGCCTACTAACGGGAT CATCGTAATGACGGCCT";
	echo countingPointMutations($input);
?>