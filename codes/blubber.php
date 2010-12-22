<?php // https://gist.github.com/751394

$zahl_text=array(1=> 'ein', 2=> 'zwei', 3=> 'drei', 4=> 'vier', 5=> 'fünf', 6=> 'sechs', 7=> 'sieben', 8=> 'acht', 9=> 'neun', 10=> 'zehn', 11=> 'elf', 12=> 'zwölf', 16=> 'sechzehn', 17=> 'siebzehn', 20=> 'zwanzig', 30=> 'dreißig', 40=> 'vierzig', 50=> 'fünfzig', 60=> 'sechzig', 70=> 'siebzig', 80=> 'achtzig', 90=> 'neunzig');

for ($i=1; $i<=10000; $i++)
{
	$zehner_zahl=0;
	$zahl=$i;
	$tausend=$zahl_text[intval($zahl / 1000)];
	if ($tausend!="") {$ausgabe.=$tausend."tausend";}
	$zahl=$zahl - intval($zahl / 1000)*1000;

	$hundert=$zahl_text[intval($zahl / 100)];
	if ($hundert!="") {$ausgabe.=$hundert."hundert";}
	$zahl=$zahl - intval($zahl / 100)*100;

	if ($zahl>12 && $zahl!=16 && $zahl!=17)
	{
		$zehner_zahl=intval($zahl / 10)*10;
		$zehner_text=$zahl_text[$zehner_zahl];
		$zahl=$zahl - $zehner_zahl;
		if ($zehner_zahl>=20 AND $zahl>0) {$und="und";} else {$und="";}
		$ausgabe.=$zahl_text[$zahl].$und.$zehner_text;
	}
	else {$ausgabe.=$zahl_text[$zahl];}

	if ($zahl==1 AND $zehner_zahl==0) {$zusatz_eins.="s";} else {$zusatz_eins="";}

	//echo $ausgabe.$einer.$zehner.$zusatz_eins."<br>";
	echo $ausgabe.$einer.$zehner.$zusatz_eins."\n";
	$ausgabe="";
}

