<?php // http://sabel.bluegfx.de/nopaste/fd3d3396167f9e097265b13401ab834f/
$einer = array('', 'eins', 'zwei', 'drei', 'vier', 'fünf', 'sechs', 'sieben', 'acht', 'neun', 'zehn');
for($i = 1; $i <= 10000; $i++){
	$z = $i;
	$str = '';
	if($z >= 1000){
		$str = $einer[floor($z / 1000)].'tausend';
		$z %= 1000;
	}
	if($z >= 100){
		$str.= str_replace('eins', 'ein', $einer[floor($z / 100)]).'hundert';
		$z %= 100;
	}
	if($z >= 10){
		if($z < 20){
			//echo $str.str_replace(array('einszehn', 'zweizehn', 'sieben'), array('elf', 'zwölf', 'sieb'), $einer[floor($z % 10)].'zehn')."<br />";
			echo $str.str_replace(array('einszehn', 'zweizehn', 'sieben'), array('elf', 'zwölf', 'sieb'), $einer[floor($z % 10)].'zehn')."\n";
			continue;
		}
		$tmp = str_replace(array('einszig', 'zwei', 'dreizig', 'sieben'), array('zehn', 'zwan', 'dreißig', 'sieb'), $einer[floor($z / 10)].'zig');					
		if(($z %= 10) > 0){
			//echo $str.str_replace('eins', 'ein', $einer[$z])."und".$tmp."<br />";
			echo $str.str_replace('eins', 'ein', $einer[$z])."und".$tmp."\n";
			continue;
		}
		$str.= $tmp;		
	}
	if($z > 0){
		$str.= $einer[$z];
	}
	//echo $str."<br />";
	echo $str."\n";
}
