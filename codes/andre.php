<?php // http://pastebin.com/XyXJ8VK9

class NumberToWord
{
    var $arrNumbers = array(
        '-1' => 'ein',
        '1' => 'eins',
        'zwei',
        'drei',
        'vier',
        'fuenf',
        'sechs',
        '-6' => 'sech',
        '7' => 'sieben',
        '-7' => 'sieb',
        '8' => 'acht',
        'neun',
        'zehn',
        'elf',
        'zwoelf',
        '20' => 'zwanzig',
        '30' => 'dreissig',
        '40' => 'vierzig',
        '50' => 'fuenfzig',
        '60' => 'sechzig',
        '70' => 'siebzig',
        '80' => 'achtzig',
        '90' => 'neunzig',
        '-00' => 'hundert',
        '-000' => 'tausend',
        'and' => 'und',
    );

    var $arrNumber = array();
    var $arrWord;

    function setNumber($strNumber = 0)
    {
        $this->arrWord = array();
        $this->arrNumber = array();
        
        if($strNumber == 0)
        {
            $this->arrWord[] = 'Null';

            return;
        }

        $strNumber = (string)$strNumber;
        for($i = 0; $i < strlen($strNumber); $i++)
        {
            $this->arrNumber[] = $strNumber[$i];
        }
        $this->arrNumber = array_reverse($this->arrNumber);
        $this->convertNumber();
    }

    function getWord()
    {
        $arrMatch = array('einzehn', 'zweizehn');
        $arrReplace = array($this->arrNumbers[11], $this->arrNumbers[12]);
        return ucfirst(str_replace($arrMatch, $arrReplace, implode('', $this->arrWord)));
    }

    function inDec($number1, $number2)
    {
        if(isset($number1))
        {
            if($number1 == 1 && in_array($number2, array(6, 7)))
            {
                return true;
            }
            else
            {
                if($number1 != 0 && $number2 == 1)
                {
                    return true;
                }
            }
        }
        elseif($number2 == 1)
        {
            return true;
        }

        return false;
    }

    function convertNumber()
    {
        $plainNumber = implode('', array_reverse($this->arrNumber));
        if($plainNumber <= 12 || in_array($plainNumber, array_keys($this->arrNumbers)))
        {
            $this->arrWord[] = $this->arrNumbers[$plainNumber];

            return;
        }

        for($i = 0, $c = count($this->arrNumber); $i < $c; $i++)
        {
            switch($i)
            {
                case '0':
                    $this->single($this->arrNumber[0], $this->inDec($this->arrNumber[1], $this->arrNumber[0]));
                    break;

                case '1':
                    $this->double($this->arrNumber[1]);
                    break;

                case '2':
                    $this->hundred($this->arrNumber[2]);
                    break;

                case '3':
                    $this->thousand($this->arrNumber[3]);
                    break;

                case '4':
                    $this->tenthousand($this->arrNumber[4], $this->arrNumber[3]);
                    break;

                case '5':
                    $this->hundredthousand($this->arrNumber[5], $this->arrNumber[4], $this->arrNumber[3]);
                    break;
            }
        }
    }

    function single($number, $inDec = false, $return = false)
    {
        if($number == 0)
        {
            return;
        }
        
        $strWord = $this->arrNumbers[($inDec) ? '-' . $number : $number];
        if($return == true)
        {
            return $strWord;
        }
        
        $this->arrWord[] = $strWord;
    }

    function double($number, $return = false, $singleNumber = '')
    {
        if($number == 0)
        {
            return;
        }

        if($return == true)
        {
            return (($number != 1 && $singleNumber != '') ? $singleNumber . $this->arrNumbers['and'] : '') . $this->arrNumbers[$number . 0];
        }
        else
        {
            $this->arrWord[] = (($number != 1 && count($this->arrWord)) ? $this->arrNumbers['and'] : '') . $this->arrNumbers[$number . 0];
        }
    }

    function hundred($number, $return = false)
    {
        if($number == 0)
        {
            return;
        }
        
        $strWord = $this->arrNumbers[($number == 1) ? '-1' : $number] . $this->arrNumbers['-00'];
        if($return == true)
        {
            return $strWord;
        }

        array_unshift($this->arrWord, $strWord);
    }

    function thousand($number)
    {
        if($number == 0)
        {
            return;
        }
        
        array_unshift($this->arrWord, $this->arrNumbers[($number == 1) ? '-1' : $number] . $this->arrNumbers['-000']);
    }

    function tenthousand($number1, $number2)
    {
        if($number1 == 0)
        {
            return;
        }

        $plainNumber = $number1 . $number2;
        if($plainNumber <= 12 || in_array($plainNumber, array_keys($this->arrNumbers)))
        {
            $strWord = $this->arrNumbers[$plainNumber];
        }
        else
        {
            $strWord = $this->double($number1, true, $this->single($number2, $this->inDec($number1, $number2), true));
        }
        
        if($number2 != 0)
        {
            unset($this->arrWord[0]);
        }
        array_unshift($this->arrWord, $strWord . $this->arrNumbers['-000']);
    }

    function hundredthousand($number1, $number2, $number3)
    {
        if($number1 == 0)
        {
            return;
        }

        array_unshift($this->arrWord, $this->hundred($number1, true) . (($number2 == 0) ? $this->arrNumbers['-000'] : ''));
    }
}

/**
 * Use
 */
//$n2w = new NumberToWord;
//$n2w->setNumber(999999);
//echo $n2w->getWord();

$n2w = new NumberToWord;
//echo '<pre>';
for($i = 1; $i <= 10000; $i++)
{
    $n2w->setNumber($i);
    //echo $n2w->getWord() . '<br />';
    echo $n2w->getWord() . "\n";
}
//echo '</pre>';