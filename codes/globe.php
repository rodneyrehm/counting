<?php

// see http://www.phpgangsta.de/wettbewerb-10-000-zahlen-ausschreiben

/*
	eins, elf, zehn, ein(hundert|tausend), einhunderteins	// special on everything
	zwei, zwölf, zwanzig, zwei(hundert|tausend)				// special on ten
	drei, dreizehn, dreissig, drei(hundert|tausend)			// special on ten
	vier, vierzehn, vierzig, vier(hundert|tausend)	
	fünf, fünfzehn, fünfzig, fünf(hundert|tausend)
	sechs, sechzehn, sechzig, sechs(hundert|tausend)		// special on ten
	sieben, siebzehn, siebzig, sieben(hundert|tausend)		// special on ten
	acht, achtzehn, achtzig, acht(hundert|tausend)
	neun, neunzehn, neunzig, neun(hundert|tausend)
 */

// base names
$names = array(
	1 => 'ein',
	2 => 'zwei',
	3 => 'drei', 
	4 => 'vier',
	5 => 'fünf',
	6 => 'sechs',
	7 => 'sieben',
	8 => 'acht',
	9 => 'neun',
	10 => 'zehn',
	11 => 'elf',
	12 => 'zwölf',
	16 => 'sechzehn',
	17 => 'siebzehn',
	20 => 'zwanzig',
	30 => 'dreißig',
	40 => 'vierzig',
	50 => 'fünfzig',
	60 => 'sechzig',
	70 => 'siebzig',
	80 => 'achtzig',
	90 => 'neunzig',
);

for( $i=1; $i <= 10000; $i++ )
{
	if( !isset( $names[ $i ] ) )
	{
		if( $i < 100 )
		{
			$e = $i % 10;
			$t = $i - $e;
			$names[ $i ] = $names[ $e ] . ( $i < 20 ? '' : 'und' ) . $names[ $t ];
		}
		else
		{
			if( $i < 1000 )
			{
				$base = 100;
				$name = 'hundert';
			}
			else //if( $i < 1000000 )
			{
				$base = 1000;
				$name = 'tausend';
			}
			
			$e = floor( $i / $base );
			$r = $i % $base;
			$names[ $i ] = $names[ $e ] . $name;

			if( $r )
			{
				$names[ $i ] .= $names[ $r ] . ( $r === 1 ? 's' : '' );
			}
		}
	}
	else if( $i === 1 )
	{
		echo $names[ $i ] ."s\n";
		continue;
	}

	echo $names[ $i ] ."\n";
}

