<?php // https://github.com/MKuckert/wordednumbers/blob/master/wordednumbers.php

$argv[1] = 1;
$argv[2] = 10000;
$argv[3] = 'de';

class WordedNumbers {
	
	/**
	 * @var array Namen für einzelne Zahlenwerte
	 */
	protected $_names=array();
	
	/**
	 * @var array Namen für einzelne Stellen
	 */
	protected $_digitNames=array();
	
	/**
	 * @var array Namen für kombinierte Zahlenwerte
	 */
	protected $_combNames=array();
	
	/**
	 * @var array Zehnerstellen, denen bei Kombination mit einer Einerstelle das Trennwort zwischengestellt werden muss.
	 */
	protected $_namesRequiringSeparator=array();
	
	/**
	 * @var array Trennwort zwischen verschiedenen Stellen
	 */
	protected $_separator='';
	
	/**
	 * @var boolean Flag, ob Zehner- und Einerstelle miteinander getauscht werden sollen.
	 */
	protected $_swapUnitPositionAndDecade=false;
	
	/**
	 * Konstruktor
	 * 
	 * @param array Anderes Locale
	 */
	public function __construct(array $locale) {
		foreach($locale as $key=>$value) {
			$this->{'_'.$key}=$value;
		}
	}
	
	/**
	 * Erstellt eine Reihe von benannten Zahlen
	 * 
	 * @return array
	 * @param integer Unterste Zahl (inklusive)
	 * @param integer Oberste Zahl (inklusive)
	 */
	public function getList($from, $to) {
		return array_map(array($this, 'getNumber'), range($from, $to));
	}
	
	/**
	 * Gibt eine einzelne benannte Zahl zurück.
	 * 
	 * @return string
	 * @param integer
	 */
	public function getNumber($num) {
		// Direkte Übereinstimmung
		if(isset($this->_names[$num])) {
			return $this->_names[$num];
		}
		
		// Einzelne Namen für einzelne Stellen
		$parts=array();
		for($i=0, $n=log($num, 10); $i<=$n; $i++) {
			$lastPart=$num%pow(10, $i+1);
			if($lastPart>10 and isset($this->_names[$lastPart])) {
				$parts=array($this->_names[$lastPart], '');
				continue;
			}
			
			$digit=$lastPart-$num%pow(10, $i);
			if($digit<=0) {
				$parts[]='';
				continue;
			}
			
			if(isset($this->_combNames[$digit]) and $value>10) {
				$parts[]=$this->_combNames[$digit];
				continue;
			}
			else if(isset($this->_names[$digit])) {
				$parts[]=$this->_names[$digit];
				continue;
			}
			
			// Kombination mit höheren Stellen
			$cleanedDigit=pow(10, floor(log($digit, 10)));
			$value=$digit/$cleanedDigit;
			
			while($cleanedDigit) {
				if(isset($this->_digitNames[$cleanedDigit])) {
					$parts[]=$this->_digitNames[$cleanedDigit];
					if(isset($this->_combNames[$value])) {
						$parts[]=$this->_combNames[$value];
					}
					else if(isset($this->_names[$value])) {
						$parts[]=$this->_names[$value];
					}
					continue 2;
				}
				
				$cleanedDigit/=10;
				$value*=10;
			}
		}
		
		// Einer- und Zehnerstelle tauschen
		if($this->_swapUnitPositionAndDecade and isset($parts[0], $parts[1])) {
			$tmp=$parts[1];
			$parts[1]=$parts[0];
			$parts[0]=$tmp;
		}
		
		// Trenner zwischen Einer- und Zehnerstelle einfügen
		$index=$this->_swapUnitPositionAndDecade ? 0 : 1;
		if(isset($parts[$index]) and in_array(array_search($parts[$index], $this->_names), $this->_namesRequiringSeparator) and !empty($parts[$index])) {
			array_splice($parts, $index+1, 0, array($this->_separator));
		}
		
		$result=implode('', array_reverse($parts));
		return $result;
	}
	
}

$locales=array(
	// Parameter für deutsche Sprachen
	'de' => array(
		'names' => array(
			1 => 'eins', 'zwei', 'drei', 'vier', 'fünf', 'sechs', 'sieben', 'acht', 'neun', 'zehn',
			'elf', 'zwölf', 16=> 'sechzehn', 'siebzehn',
			20 => 'zwanzig',
			30 => 'dreißig',
			40 => 'vierzig',
			50 => 'fünfzig',
			60 => 'sechzig',
			70 => 'siebzig',
			80 => 'achtzig',
			90 => 'neunzig',
		),
		'digitNames' => array(
			100 => 'hundert',
			1000 => 'tausend'
		),
		'combNames' => array(1 => 'ein'),
		'namesRequiringSeparator' => array(20, 30, 40, 50, 60, 70, 80, 90),
		'separator' => 'und',
		'swapUnitPositionAndDecade' => true
	),
	// Parameter für englische Sprachen
	'en' => array(
		'names' => array(
			1 => 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten',
			'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen',
			20 => 'twenty',
			30 => 'thirty',
			40 => 'fourty',
			50 => 'fifty',
			60 => 'sixty',
			70 => 'seventy',
			80 => 'eighty',
			90 => 'ninety'
		),
		'digitNames' => array(
			100 => 'hundred',
			1000 => 'thousand'
		)
	),
	// Test
	'empty' => array()
);

// Test per CLI
if($argc<2) {
	die('usage: '.basename(__FILE__).' <from> [<to>] [<locale>]');
}

if(isset($argv[3])) {
	if(!isset($locales[$argv[3]])) {
		die('Given locale not found');
	}
	$locale=$locales[$argv[3]];
}
else {
	$locale=reset($locales);
}

$worded=new WordedNumbers($locale);
$list=$worded->getList($argv[1], isset($argv[2]) ? $argv[2] : $argv[1]);
echo implode(PHP_EOL, $list);
