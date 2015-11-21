<?php namespace Acme;

ini_set('error_reporting', E_ALL);

class Prot {
	private $codonTable = [
		'F' => ['UUU', 'UUC'],
		'L' => ['UUA', 'UUG', 'CUU', 'CUC', 'CUA', 'CUG'],
		'S' => ['UCU', 'UCC', 'UCA', 'UCG', 'AGU', 'AGC'],
		'Y' => ['UAU', 'UAC'],
		'C' => ['UGU', 'UGC'],
		'W' => ['UGG'],
		'P' => ['CCU', 'CCC', 'CCA', 'CCG'],
		'H' => ['CAU', 'CAC'],
		'Q' => ['CAA', 'CAG'],
		'R' => ['CGU', 'CGC', 'CGA', 'CGG', 'AGA', 'AGG'],
		'I' => ['AUU', 'AUC', 'AUA'],
		'M' => ['AUG'],
		'T' => ['ACU', 'ACC', 'ACA', 'ACG'],
		'N' => ['AAU', 'AAC'],
		'K' => ['AAA', 'AAG'],
		'V' => ['GUU', 'GUC', 'GUA', 'GUG'],
		'A' => ['GCU', 'GCC', 'GCA', 'GCG'],
		'D' => ['GAU', 'GAC'],
		'E' => ['GAA', 'GAG'],
		'G' => ['GGU', 'GGC', 'GGA', 'GGG']
	];
	private $stopTable = ['UAA', 'UAG', 'UGA'];

	public function translateRnaIntoProtein($rnaString)
	{
		$this->isValidmRna($rnaString);

		$codons = str_split($rnaString, 3);
		return count($codons);
		//return 'MAMAPRTEINSTRING';
	}

	private function isValidmRna($rnaString)
	{
		$numberOfNucleotides = strlen($rnaString);

		if ($numberOfNucleotides / 2 > 10000) {
			throw new \InvalidArgumentException('Invalid argument');
		}
	}
}