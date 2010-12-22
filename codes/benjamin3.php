<?
$e=$d=array('','eins','zwei','drei', 'vier', 'fuenf', 'sechs','sieben', 'acht', 'neun', 'zehn','elf','zwoelf','dreizehn','vierzehn','fünfzehn','sechzehn','siebzehn','achtzehn','neunzehn','zwanzig',30=>'dreissig',40=>'vierzig',50=>'fünfzig',60=>'sechzig',70=>'siebzig',80=>'achtzig',90=>'neunzig');
$e[1]='ein';

while (($n=++$i)<10001) {
  if ($n>999) {
    echo $e[$n/1000],'tausend';
    $n%=1000;
  }
  
  if ($n>99) {
    echo $e[$n/100],'hundert';
    $n%=100;
  }
  
  if ($n<20 && $n>0) echo $d[$n],"\n";
  else {
    if ($t=$n%10) echo $e[$t],'und'; 
    echo $d[$n-$t],"\n";
  }
}