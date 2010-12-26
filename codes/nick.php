<?php // http://pastebin.com/xaLU0Vck
class numberToHuman {
protected $_begin1er = array(1 => "ein", 2 => "zwei", 3 => "drei", 4 => "vier", 5 => "fünf", 6 => "sechs", 7 => "sieben", 8 => "acht", 9 => "neun");
protected $_specials = array(1 => "eins", 11 => "elf", 12 => "zwölf", 16 => "sechzehn", 17 => "siebzehn", 1000 => "eintausend", 10000 => "zehntausend");
protected $_begin10er = array(10 => "zehn", 20 => "zwanzig", 30 => "dreißig", 40 => "vierzig", 50 => "fünfzig", 60 => "sechzig", 70 => "siebzig", 80 => "achtzig", 90 => "neunzig");
protected $_multiplikator = array(100 => "hundert", 1000 => "tausend");
public function drawList10000() {
  for ($i = 1; $i <= 10000; $i++)
    //echo $this->drawSingleNumber($i)."<br />\r\n";
    echo $this->drawSingleNumber($i)."\n";
  return true;
 }
public function drawSingleNumber($number) { 
  if ($ret = $this->_specials[$number]) return $ret;
  switch (strlen($number)):
      case 1    :   return $this->_begin1er[$number];
      case 2    :   return $this->fetchDoppel($number);
      case 3    :   return $this->fetchTriple($number);
      case 4    :   return $this->fetchQuadro($number);
  endswitch;
  return false;
 }
private function fetchDoppel($number) {
  if ($ret = $this->_specials[$number]) return $ret;
  $zeichen1 = substr($number,0,1);
  $zeichen2 = substr($number,1,1);
  if ($zeichen2 == 0):
    return $this->_begin10er[$number];
  elseif ($zeichen1 == 1):
    return $this->_begin1er[$zeichen2].$this->_begin10er[10];
  else:
    return $this->_begin1er[$zeichen2]."und".$this->_begin10er[$zeichen1*10];
  endif;
 }
private function fetchTriple($number) {
  if ($ret = $this->_specials[$number]) return $ret;
  $zeichen1 = substr($number,0,1);
  $zeichen2 = substr($number,1,1);
  $zeichen3 = substr($number,2,1);
  $part2 = ($zeichen2.$zeichen3);
  if ($zeichen2 == 0 AND $zeichen1 == 0) return ($this->_begin1er[$zeichen3]).(($zeichen3 == 1) ? "s" : "");	
  if ($zeichen1 == 0) return $this->fetchDoppel($part2);
  return $this->_begin1er[$zeichen1].$this->_multiplikator[100].(($zeichen2 == 0 AND $zeichen3 != 0) ? $this->_begin1er[$zeichen3] : $this->fetchDoppel($part2)).(($part2 == "01") ? "s" : "");
 }
private function fetchQuadro($number) {
  if ($ret = $this->_specials[$number]) return $ret;
  $zeichen1 = substr($number,0,1);
  $zeichen2 = substr($number,1,1);
  $zeichen3 = substr($number,2,1);
  $zeichen4 = substr($number,3,1);
  $part3 = ($zeichen2.$zeichen3.$zeichen4);
  
  return $this->_begin1er[$zeichen1].$this->_multiplikator[1000].$this->fetchTriple($part3);
 }
}
$draw = new numberToHuman();
$draw->drawList10000();
