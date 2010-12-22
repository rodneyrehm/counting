<?php

if( empty( $argv[1] ) )
{
	$results = array();
	$tests = array(
		'globe',
		'globe2',
		'eric',
		'eric2',
		'edo',
		'chrisb',
		'philip',
		'be',
		'dominik',
		'andre',
		'benjamin',
		'benjamin2',
		'benjamin3',
		'martin',
		'blubber',
	);

	foreach( $tests as $test )
	{
		// run test in its own process please
		$res = `php -d short_open_tag=On test.php $test run`;
		$results[ $test ] = explode( "\n", $res );

		//$res = `php test.php $test iterations`;
		//$results[ $test ]['iterations'] = explode( "\n", $res );
	}
	
	function output( $results, $sort=1 )
	{
		usort( $results, function( $a, $b ) use($sort)
		{
			$an = $a[ $sort ];
			$bn = $b[ $sort ];
			if( $an == $bn )
				return 0;

			return $an < $bn ? -1 : 1;
		});

		echo "\napproach | time | memory | peak | characters | errors \n"
			."---------|------|--------|------|------------|--------\n";

		foreach( $results as $res )
		{
			echo join( ' | ', $res ) . "\n";
		}
	}
	
	output( $results, 1 );
	output( $results, 4 );
}
else if( $argv[2] == 'run' )
{
	ini_set('display_errors', 0);
	ini_set('log_errors', 0);
	$test = $argv[1];
	
	$memory = memory_get_usage();
	$memory_peak = memory_get_peak_usage();
	$start = microtime( true );
	ob_start();

	include dirname( __FILE__ ) .'/codes/'. $test .'.php';

	$out = ob_get_clean();
	$duration = round( microtime( true ) - $start, 4 );
	$_memory = round( (memory_get_usage() - $memory) / 1024, 2 );
	$_memory_peak = round( memory_get_peak_usage() / 1024, 2 );
	
	// try to make code length comparable
	// yes, this is a very rudimentary cleanup…
	$code = file_get_contents( dirname( __FILE__ ) .'/codes/'. $test .'.php' );
	// strip comments
	$code = preg_replace( '#/\*.*?\*/#ms', '', $code );
	$code = preg_replace( '#//.*$#m', '', $code );
	// reduce spaces
	$code = preg_replace( '#[\s\r\n]+#', ' ', $code );
	
	$length = mb_strlen( $code, 'UTF-8' );
	
	// test results
	$values = array( 
		1 => 'eins',
		12 => 'zw(ö|oe)lf',
		21 => 'einundzwanzig',
		26 => 'sechsundzwanzig',
		27 => 'siebenundzwanzig',
		33 => 'dreiunddrei(ß|ss)ig',
		60 => 'sechzig',
		61 => 'einundsechzig',
		66 => 'sechsundsechzig',
		70 => 'siebzig',
		71 => 'einundsiebzig',
		77 => 'siebenundsiebzig',
		100 => 'einhundert',
		101 => 'einhunderteins',
		174 => 'einhundertvierundsiebzig',
		764 => 'siebenhundertvierundsechzig',
		1000 => 'eintausend',
		1001 => 'eintausendeins',
		1016 => 'eintausendsechzehn',
		2067 => 'zweitausendsiebenundsechzig',
		10000 => 'zehntausend',
	);
	
	$errors = array();
	$_out = explode( "\n", $out );
	foreach( $values as $key => $value )
	{
		if( empty( $_out[ $key -1 ] ) || !preg_match( '#^' . $value . '$#i', $_out[ $key -1 ] ) )
			$errors[] = $key;
	}
	
	$errors = $errors ? join( ', ', $errors ) : '-';
	
	file_put_contents( dirname( __FILE__ ) .'/results/'. $test .'.txt', $out );
	echo "$test\n$duration\n$_memory\n$_memory_peak\n$length\n$errors";
}
else if( $argv[2] == 'iterations' )
{
	$__script = $argv[1] .'.php';
	$__iterations = 0;
	$__limit = 1;
	$__duration = 0;
	$__start = microtime( true );
	while( $__duration < $__limit )
	{
		$res = `php $__script`;
		$__duration = microtime( true ) - $__start;
		$__iterations++;
	}

	echo "$argv[1]\n$__iterations\n$__duration";
}