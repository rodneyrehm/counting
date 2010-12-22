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

class GermanNumbers
{
	// base names
	protected static $names = array(
		0 => 'null',
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
	
	protected static function base( $i )
	{
		if( $i < 100 )
			return 10;
		
		if( $i < 1000 )
			return 100;
		
		if( $i < 1000000 )
			return 1000;
		
		throw new Exception( $i .' is out of bounds for conversion' );
	}
	
	public static function convert( $i )
	{
		if( $i < 0 )
			throw new Exception( $i .' is out of bounds for conversion' );

		if( $i === 1 )
			return 'eins';
		
		return self::_convert( $i );
	}
	
	public static function _convert( $i )
	{
		if( isset( self::$names[ $i ] ) )
			return self::$names[ $i ];
			
		$base = self::base( $i );
		if( $base == 10 )
		{
			$a = $i % $base;
			$b = $i - $a;
		}
		else
		{
			$a = floor( $i / $base );
			$b = $i % $base;
		}
		
		$_a = self::_convert( $a );
		$_b = $b ? ( self::_convert( $b ) . ( $b === 1 ? 's' : '' ) ) : '';
		
		if( $i < 20 )
			return self::$names[ $i ] = $_a . $_b;

		if( $i < 100 )
			return self::$names[ $i ] = $_a . 'und' . $_b;
		
		if( $i < 1000 )
			return self::$names[ $i ] = $_a . 'hundert' . $_b;
		
		if( $i < 1000000 )
			return self::$names[ $i ] = $_a . 'tausend' . $_b;
	}
	
}

/*
// Random Access:
echo GermanNumbers::convert( 999 ) ."\n";
echo GermanNumbers::convert( 135 ) ."\n";
echo GermanNumbers::convert( 17 ) ."\n";
echo GermanNumbers::convert( 1155 ) ."\n";
*/

for( $i=1; $i <= 10000; $i++ )
{
	echo GermanNumbers::convert( $i ) ."\n";
}

