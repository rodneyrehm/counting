<?php // http://triff-chemnitz.de/10000.txt
$_e = array('', 'ein', 'zwei', 'drei', 'vier', 'fünf', 'sechs', 'sieben', 'acht', 'neun');
$_z = array('', 'zehn', 'zwanzig', 'dreißig', 'vierzig', 'fünfzig', 'sechsig', 'siebzig', 'achzig', 'neunzig');
for ( $i=1; $i<=9999; $i++ ) {
	list($t,$h,$z,$e) = explode('.', sprintf("%d.%d.%d.%d",$i/1000%10,$i/100%10,$i/10%10,$i/1%10));
	if ($t)					$x .= $_e[$t].'tausend';
	if ($h) 				$x .= $_e[$h].'hundert';
	if ($z<1)				$x .= $_e[$e].($e==1?'s':'');
	else switch (true) {
		case $e&&$z>1	: 	$x .= $_e[$e].'und';
		case $z>1 		: 	$x .= $_z[$z];			break;
		case $e==1		: 	$x .= 'elf';			break;
		case $e==2		: 	$x .= 'zwölf';			break;
		case $e==7		: 	$x .= 'siebzehn';		break;
		default			: 	$x .= $_e[$e].'zehn';	break;
	}
	//echo "$x<br>\n"; $x='';
	echo "$x\n"; $x='';
}
echo 'zehntausend'; #;)