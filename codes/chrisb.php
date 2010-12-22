<?php // http://pastebin.com/7Nz5fFb9

class Zahl {
	private static $einer = array('', 'ein', 'zwei', 'drei', 'vier', 'fünf', 'sechs', 'sieben', 'acht', 'neun');
	private static $zehner = array(1=>'zehn', 'zwanzig', 'dreissig', 'vierzig', 'fünfzig', 'sechzig', 'siebzig', 'achtzig', 'neunzig');
	private static $sonderfaelle = array(10=>'zehn', 'elf', 'zwölf', 'dreizehn', 'vierzehn', 'fünfzehn', 'sechzehn', 'siebzehn', 'achtzehn', 'neunzehn');
	
	public static function alsZahl($zahl, $zehner = false) {
		if($zahl > 10000 || $zahl < 0) {
			return '[sorry, keine darstellung]';
		}
		elseif($zahl == 10000) {
			return 'zehntausend';
		}
		elseif($zahl > 999) {
			return self::$einer[floor($zahl/1000)].'tausend'.self::alsZahl($zahl % 1000);
		}
		elseif($zahl > 99) {
			return self::$einer[floor($zahl/100)].'hundert'.self::alsZahl($zahl % 100);
		}
		elseif($zahl > 19) {
			return self::alsZahl($zahl%10, true).($zahl%10?'und':'').self::$zehner[floor($zahl/10)];
		}
		elseif($zahl > 9) {
			return self::$sonderfaelle[$zahl];
		}
		elseif($zahl == 1) {
			return 'ein'.($zehner?'':'s');
		}
		else {
			return self::$einer[$zahl];
		}
	}
}

//echo '<pre>';
//for($i=1; $i<10001; ++$i) printf("% 5d : %s\n", $i, Zahl::alsZahl($i));
for($i=1; $i<10001; ++$i) printf("%s\n", Zahl::alsZahl($i));
//echo '</pre>';

