<?php // http://s-db.de/num_to_text.php

/**
 * @author Dominik A. Bonsch <contact@s-db.de>
 *
 */
class LibNumberToTextDe
{

  private $humLang = array
  (
    1 => array
    (
      0 => '',
      1 => 'eins',
      2 => 'zwei',
      3 => 'drei',
      4 => 'vier',
      5 => 'fünf',
      6 => 'sechs',
      7 => 'sieben',
      8 => 'acht',
      9 => 'neun',
    ),
    2 => array
    (
      1 => 'zehn',
      10 => 'zehn',
      11 => 'elf',
      12 => 'zwölf',
      16 => 'sechzehn',
      17 => 'siebzehn',
      2 => 'zwanzig',
      3 => 'dreisig',
      4 => 'vierzig',
      5 => 'fünfzig',
      6 => 'sechzig',
      7 => 'siebzig',
      8 => 'achtzig',
      9 => 'neunzig',
    ),
    3 => array
    (
      'x' => 'hundert',
    ),
    4 => array
    (
      'x' => 'tausend',
    )

  );

  /**
   * @param int $number
   * @return string
   */
  function numberToText( $number )
  {

    $number = (int)$number;

    if($number>10000)
      throw new Exception( 'Sorry, this number ist to big. Only numbers till 10.000 are supported' );

    // small hack to simplify the numberhandling between the borders
    if( $number == 10000 )
      return 'zehntausend';

    if( $number == 0 )
      return 'null';

    if($number<0)
      throw new Exception( 'Sorry, negativ numbers are not supported' );

    $tokens = $this->createTokens( $number );

    $size = count($tokens);

    $text = '';

    while( $tokens )
    {
      $val = array_pop($tokens);

      if( $size == 1 )
      {
        $text .= $this->humLang[1][$val];
      }
      elseif( $size == 2 )
      {
        $secondVal = array_pop($tokens);
        if( $val == 0 )
        {
          $text .= $this->humLang[1][$secondVal];
        }
        else if( $val == 1 )
        {
          $subNum = 10+$secondVal;
          if( isset( $this->humLang[2][$subNum] ) )
          {
            $text .= $this->humLang[2][$subNum];
          }
          else
          {
            $text .= $this->humLang[1][$secondVal].'zehn';
          }
        }
        else
        {
          if($secondVal==0)
          {
            $text .= $this->humLang[2][$val];
          }
          else if($secondVal==1)
          {
            $text .= 'eindund'.$this->humLang[2][$val];
          }
          else
          {
            $text .= $this->humLang[1][$secondVal].'und'.$this->humLang[2][$val];
          }
        }
      }
      else
      {
        // if not null
        if( $val )
        {
          if( $val == 1 )
          {
            $text .=  'ein'.$this->humLang[$size]['x'];
          }
          else
          {
            $text .=  $this->humLang[1][$val].$this->humLang[$size]['x'];
          }

        }

        --$size;
      }

    }//end loop

    return $text;
  }//end function numberToText */

  /**
   * @param int $number
   * @param array $tokens
   * @return array
   */
  private function createTokens( $number, $tokens = array() )
  {

    $last     = $number % 10;
    $tokens[] = $last;

    $cleaned = $number - $last;

    if( $cleaned == 0 )
      return $tokens;

    return $this->createTokens( ($cleaned/10), $tokens );

  }//end private function createTokens */

}


$numberFormatter = new LibNumberToTextDe();

//echo "<pre>".highlight_file(__FILE__)."</pre>";

for( $number = 1; $number <= 10000; ++$number )
{
//  echo $numberFormatter->numberToText( $number )."\n<br />";
  echo $numberFormatter->numberToText( $number )."\n";
}
