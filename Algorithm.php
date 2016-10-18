<?php
    require('Structure.php');
    $cPot = false;
    $cJos = false;


function random_Arr($arg){
	if($arg==2){
		$arr=array(0,0);
		$arr[0]=rand(1,2);
		$arr[1]= $arr[1]==2 ? 1 : 2;
	}else{
    	$arr=array(0,0,0);
		$arr[0]=rand(1,$arg/3);
		$arr[1]=rand($arg/3+1,$arg*2/3);
		$arr[2]=rand($arg*2/3+1,$arg);
		}
	return $arr;
}


    function iWant($arg){
        if($arg->c_pot || $arg->c_jos){
            er($arg);
            
        }
        else {
            if (isset($arg->food))
            {
                $arg->A = filter($arg->food,$arg->A);
            }
            if (isset($arg->attribute))
            {
                $arg->A = filter($arg->attribute,$arg->A);
            }
            if (isset($arg->number) && $arg->number >1) $arg->BR = $arg->number;
            centralna($arg);
        }
    }
    function centralna($arg)
    {
        if($arg->A->number ==1){
            potvrda($arg);
        }
        elseif($arg->A->number > 1){
            pocetak($arg);
            $arr = random_Arr($arg->A->number);
            $str = "";
            $str.= "We have " . $arg->A->get($arr[0])->attr . " " . $arg->A->get($arr[0])->food;
            $str.= ", " . $arg->A->get($arr[1])->attr . " " . $arg->A->get($arr[1])->food. ", ...\n";
            $arg->RET = $str . $arg->RET;
        } else {
            er($arg);
        }
    }
        
    

    function iDontWant($arg){
        if($arg->c_pot || $arg->c_jos) {
            er($arg);
        }
        $a1 = inversefilter($arg->attribute,$arg->A);
        $a2 = inversefilter($arg->food,$arg->A);
        $arg->A = intersect($a1,$a2);
        
        centralna($arg);
    }

    function iDontKnow($arg){
        if($arg->c_pot || $arg->c_jos) {
            er($arg);
        } else{
            if (isset($arg->food) && strlen($arg->food)>0)
            {
                $arg->A = filter($arg->food,$arg->A);
            }
            centralna($arg);
        }

    }

    function hello($arg){
        if($arg->c_pot || $arg->c_jos) {
            er($arg);
        }else
        $arg->RET= "Hi";
        


    }

    function goodbye($arg){
        if($arg->c_pot || $arg->c_jos) {
            er($arg);
        } else
        $arg->RET= "Bye";

    }

    function yes($arg){
        $arg->c_pot = true;
         if($arg->c_pot){
             $arg->c_pot = false;
             jos($arg);
             $arg->c_jos = true;
         }
        elseif ($arg->c_jos){
            $arg->c_jos = false;
            $arg->S->put($arg->A->get(0));
            $arg->A = set_default($Base);
            pocetak($arg);
        }
        else{
            er($arg);
        }


    }

    function no($arg){
        $arg->c_pot= false;
        $arg->c_jos = true;
        if($arg->c_pot){
            $arg->A = set_default($Base);
            $arg->c_pot = false;
            pocetak($arg);
        }
        else if($arg->c_jos){
            kraj($arg);
            $arg->c_jos = false;
        } else {
            er($arg);
        }
    }
    
    function none($arg){
        er($arg);
    }

    function jos($arg)
    {
                $arg->RET = "Do you want more?";

        
    }

    function potvrda($arg){
        $arg->RET = "Do you approve ". $arg->BR . " " . $arg->attribute . " " . $arg->food . "?";
    }
    
    function kraj($arg){
        $arg->RET = "Your order is completed then goodbye.";

    }

    function pocetak($arg){
        $arg->RET = "What do you want to order?";

    }
    function er($arg){
        $arg->RET = "Greska u unosu!";
    }
    

?>