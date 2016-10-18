<?php
require ('Algorithm.php');
class Arg{
    var $c_pot;
    var $c_jos;
    var $A;
    var $S;
    var $BR;
    var $RET;
    var $type;
    var $attribute;
    var $number;
    function Arg($c_pot1,$c_jos1,$A1,$S1,$BR1,$RET1,$type1,$attribute1,$number1)
    {
        $this->c_pot = $c_pot1;
        $this->c_jos = $c_jos1;
        $this->A = $A1;
        $this->S = $S1;
        $this->BR = $BR1;
        $this->RET = $RET1;
        $this->food = $type1;
        $this->attribute = $attribute1;
        $this->number = $number1;
        
    }
}


$reason_c = 0;
$procent_c = 0;
$entities_c = 0;

$temp = '';

$reason = '';
$procenat = '';
$food = '';
$attribute = '';
$number = '';



$query = "https://api.projectoxford.ai/luis/v1/application?id=7cd88ba2-719b-4cb2-8b8d-9538fcffbe5b&subscription-key=cacac477e8104373a657bf4033b0e212";
$query = $query . '&q=' . urlencode($_GET["kw"]);

$string = file_get_contents($query);

//$json_a = json_decode($string, TRUE);

$jsonIterator = new RecursiveIteratorIterator(
    new RecursiveArrayIterator(json_decode($string, TRUE)),
    RecursiveIteratorIterator::SELF_FIRST);

foreach ($jsonIterator as $key => $val) {
    if($key === 'intent' && $reason_c < 1) {
        $reason = $val;
        $reason_c = 1;
    } 
    if($key === 'score' && $procent_c < 1) {
        $val = round($val,2);
        $procenat = $val;
        $procent = 1;
    }
    
    if($key === 'type' && $entities_c == 1) {
   
        if($val == 'builtin.number')
        {
         $number = $temp;
        }
        else if($val == 'attribute')
        {
         $attribute = $temp;
        }
        else if($val == 'food')
        {
         $food = $temp;
        }
        $entities_c = 0;
    }
    
    if($key === 'entity' && $entities_c < 1) {
        
        $temp = $val;
    
        $entities_c++;
    } 
    
    
    
}
session_start();

$c_pot= $_SESSION['c_pot'];
$c_jos= $_SESSION['c_jos'];
$A= $_SESSION['A'];
$S= $_SESSION['S'];
$BR = $_SESSION['BR'];

if (!isset($_SESSION['init']) || $_SESSION['init']== false )
{
 $A = set_default($Base);
 $S = new Products();
 $c_pot = false;
$c_jos = false;
$BR = 1;
}

$Argument = new Arg($c_pot,$c_jos,$A,$S,$BR, '',$food,$attribute,$number);

if($reason == 'iWant')
{
    
    iWant($Argument);

    
}
else if($reason == 'dontWant')
{
    iDontWant($Argument);
    
}
else if($reason == 'iDontKnow')
{
    
    iDontKnow($Argument);
    
}else if ($reason == 'hello'){
    hello($Argument);
} else if ($reason == 'goodbye'){
    goodbye($Argument);    
}else if ($reason == 'yes'){
    yes($Argument);
}else if ($reason == 'no')
{
    no($Argument);
}
else {none($Argument);}
$_SESSION['c_pot'] = $Argument->c_pot ;
$_SESSION['c_jos'] = $Argument->c_jos;
$_SESSION['A'] = $Argument->A;
$_SESSION['S'] = $Argument->S;
$_SESSION['BR'] = $Argument->BR;

echo (string)$Argument->RET;
?>