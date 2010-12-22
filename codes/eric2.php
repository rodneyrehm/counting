<?php // https://gist.github.com/751336
$a = array('', 'ein', 'zwei', 'drei', 'vier', 'fünf', 'sechs', 'sieben', 'acht', 'neun');
$b = array('', $c = 'zehn', 'zwanzig', 'dreißig', 'vierzig', 'fünfzig', 'sechzig', 'siebzig', 'achtzig', 'neunzig');

for ( $i=1; $i<=9999; $i++ ) {

	list($t,$h,$z,$e) = explode('.', sprintf("%d.%d.%d.%d", $i/1000%10, $i/100%10, $i/10%10, $i/1%10));
	$n = $a[$e];
	
	if ($t)		$x  = $a[$t].$d = 'tausend';
	if ($h) 	$x .= $a[$h].'hundert';
	if ($z>1)	$x .= $e ? $n.'und'.$b[$z] : $b[$z];
	elseif ($z)
		$x .=   ($e==1) ? 	'elf'
			:  (($e==2) ? 	'zwölf'
			:  (($e==6)	? 	"sech$c"
			:  (($e==7)	? 	"sieb$c"
			:				$n.$c
		)));
	else		$x .= $n.($e==1?'s':'');
	//echo "$x<br>"; $x='';
	echo "$x\n"; $x='';
}

echo $c.$d;
?>