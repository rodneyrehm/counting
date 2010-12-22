<?php // http://sandbox.benedict-etzel.de/numbers/source.txt
class wordnumbers {
	private $root;
	private $one;
	private $ten;
	
	function __construct() {
		$this->root = array('ein', 'zwei', 'drei', 'vier', 'fünf', 'sech', 'sieb', 'acht', 'neun');
		$this->one = $this->root;
		$this->one[1-1] = 'eins';
		$this->one[6-1] = 'sechs';
		$this->one[7-1] = 'sieben';
		$this->one[10-1] = 'zehn';
		$this->one[11-1] = 'elf';
		$this->one[12-1] = 'zwölf';
		$this->ten = array('zehn', 'zwanzig', 'dreißig');
		for($i = 4; $i <= 9; $i++) {
			$this->ten[$i-1] = $this->root[$i-1].'zig';
		}
	}
	
	public function get_number($number, $root = false) {
		$number = ltrim($number, '0');
		if($number == 0) {
			return '';
		}
		else if($number <= 12) {
			if($root) {
				return $this->root[$number-1];
			}
			else {
				return $this->one[$number-1];
			}
		}
		else if($number <= 99) {
			$one = $this->get_number(substr($number, 1, 1), true);
			$link = substr($number, 0, 1) > 1 && $one ? 'und' : '';
			$ten = $this->ten[substr($number, 0, 1)-1];
			return $one.$link.$ten;
		}
		else if($number <= 999) {
			$one = $this->get_number(substr($number, 0, 1), false);
			$rest = $this->get_number(substr($number, 1));
			return $one.'hundert'.$rest;
		}
		else if($number <= 9999) {
			$one = $this->get_number(substr($number, 0, 1), true);
			$rest = $this->get_number(substr($number, 1));
			return $one.'tausend'.$rest;
		}
		else if($number <= 99999) {
			$ten = $this->get_number(substr($number, 0, 2), false);
			$rest = $this->get_number(substr($number, 2));
			return $ten.'tausend'.$rest;
		}
		else {
			return 'N/A';
		}
	}
}

header('Content-Type: text/plain');
$wordnumbers = new wordnumbers();
for($i = 1; $i <= 10000; $i++) {
	echo $wordnumbers->get_number($i).PHP_EOL;
}
