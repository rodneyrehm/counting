<?php // https://gist.github.com/raw/750568/b3d18d5108c38e1dd022b7eca8cd4f48848197fd/numbers.php

function n($n, $a=0) 
{
    $e = array(0, 0, 'zwan', 'dreiszig')
       +
    $d = explode(':', ':ein:zwei:drei:vier:fuenf:sech:sieb:acht:neun:zehn:elf:zwoelf');
    $t = $n%10;

    return 
        $n<1000
            ?($n<100
                ?($n<20
                    ?($n<13
                        ?($d[$n].((($n-1||$a)&&$n-6)?($n-7?'':'en'):'s'))
                        :$d[$t].'zehn')
                    :n($t,1).($t?'und':'').$e[$n/10].(ceil($n/10)!=4?'zig':''))
                :n((int)$n/100,1).'hundert'.n($n%100))
            :n($n/1000,1).'tausend'.n($n%1000);
}
$i=0;
//while ($i<1000000)
while ($i<10000)
    echo n(++$i),"\n";
