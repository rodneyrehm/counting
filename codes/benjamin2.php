<?php

class NumberToWordConverter
{
    private $numbers = array(
        '', 'ein',  'zwei', 'drei', 'vier', 'fünf', 'sech',
            'sieb', 'acht', 'neun', 'zehn', 'elf',  'zwölf'
    );

    private $numbersSingle = array(
        1 => 'eins',
        6 => 'sechs',
        7 => 'sieben'
    );

    private $numbersPrefix = array(
        6 => 'sechs',
        7 => 'sieben'
    );

    private $decimalSpecials = array(
        2 => 'zwanzig',
        3 => 'dreißig'
    );

    private $powers = array(
         100 => 'hundert',
        1000 => 'tausend'
    );

    public function __construct()
    {
        krsort($this->powers, SORT_NUMERIC);
    }

    public function convert($n)
    {
        if ($n != abs(round($n))) {
            throw new \InvalidArgumentException("Argument is not a positive integer");
        }

        if ($n == 0) {
            return 'null';
        }

        return $this->powers($n);
    }
 
    private function belowTwenty($n, $prefix=false)
    {
        $numbers = $prefix
            ? $this->numbersPrefix
            : $this->numbersSingle;

        $numbers += $this->numbers;

        // 0 .. 12
        if (isset($numbers[$n])) {
            return $numbers[$n];
        }

        // 13 .. 19
        return $this->numbers[$n%10] . 'zehn';
    }

    private function decimals($n, $prefix=false)
    {
        $d = intval($n/10);
        $c = $n % 10;
        $p = '';

        // below 20 is handled separately
        if ($d < 2) {
            return $this->belowTwenty($n, $prefix);
        }

        // there is no prefix for zero
        if ($c > 0) {
            $p = $this->belowTwenty($n%10, true) . 'und';
        }

        // check special decimal names
        if (isset($this->decimalSpecials[$d])) {
            return $p . $this->decimalSpecials[$d];
        } else {
            return $p . $this->numbers[$d] . 'zig';
        }
    }

    private function powers($n, $prefix=false)
    {
        $result = '';
        // $this->powers is sorted once in __construct()
        foreach ($this->powers as $power => $name) {
            if ($n < $power) {
                continue;
            }

            $result .= $this->powers(floor($n / $power), true) . $name;
            $n = $n % $power;
        }

        return $result . $this->decimals($n, $prefix);
    }
}

$t = new NumberToWordConverter();
for( $i=1; $i <= 10000; $i++ )
{
	echo $t->convert( $i ) ."\n";
}
