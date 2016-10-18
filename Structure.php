<?php 
class Products {
    var $array;
    var $number;
    function Products()
    {
        $this->number = 0;
        $this->array = array();
    }
    function put($x)
    {
        $this->array[$this->number]=$x;
        $this->number=$this->number+1;
    }
    function get($x)
    {
        return $this->array[$x];
    }
}
class Product {
    function Product($t,$a,$d)
    {
        $this->food=$t;
        $this->attr=$a;
        $this->description=$d;
    }
    var $food;
    var $attr;
    var $description;
}

    $Base =new Products();
    $Base->put(new Product("classic","triangle","White wheat bread 55%, bacon 17%, salad cream 14%, cheese 11%, sour pickle 11%"));
    $Base->put(new Product("tuna","triangle","White wheat bread with seeds 56%, tuna 18%, salad cream 18%, bulbs 4%, sour pickle 4%"));
    $Base->put(new Product("ham","triangle","White wheat bread with seeds 52%, tuna 18%, salad cream 18%, bulbs 4%, sour pickle 4%"));
    $Base->put(new Product("beacon","triangle","White wheat bread with seeds 52%, tuna 18%, salad cream 18%, bulbs 4%, sour pickle 4%"));
    $Base->put(new Product("sausage","triangle","White wheat bread with seeds 52%, tuna 18%, salad cream 18%, bulbs 4%, sour pickle 4%"));
    $Base->put(new Product("chicken","triangle","White wheat bread with seeds 52%, tuna 18%, salad cream 18%, bulbs 4%, sour pickle 4%"));
    $Base->put(new Product("winter salami","triangle","White wheat bread with seeds 52%, tuna 18%, salad cream 18%, bulbs 4%, sour pickle 4%"));
    $Base->put(new Product("turkey","triangle","White wheat bread with seeds 52%, tuna 18%, salad cream 18%, bulbs 4%, sour pickle 4%"));
    $Base->put(new Product("3xcheese","triangle","White wheat bread with seeds 52%, tuna 18%, salad cream 18%, bulbs 4%, sour pickle 4%"));
    $Base->put(new Product("classic","cube","White wheat bread with seeds 52%, tuna 18%, salad cream 18%, bulbs 4%, sour pickle 4%"));
    $Base->put(new Product("ham","cube","White wheat bread with seeds 52%, tuna 18%, salad cream 18%, bulbs 4%, sour pickle 4%"));
    $Base->put(new Product("cheese","cube","White wheat bread with seeds 52%, tuna 18%, salad cream 18%, bulbs 4%, sour pickle 4%"));
    $Base->put(new Product("classic","baguette","White wheat bread with seeds 52%, tuna 18%, salad cream 18%, bulbs 4%, sour pickle 4%"));
    $Base->put(new Product("fried chicken","baguette","White wheat bread with seeds 52%, tuna 18%, salad cream 18%, bulbs 4%, sour pickle 4%"));
    $Base->put(new Product("ham","baguette","White wheat bread with seeds 52%, tuna 18%, salad cream 18%, bulbs 4%, sour pickle 4%"));

function set_default($A)
{
    $x1temp = new Products();
    for ($i=0;$i<$A->number;$i++)
    {
        
        $x1temp->put($A->get($i));
        
    }
    return $x1temp;
}

function intersect($x1,$x2)
{
    $x1temp = new Products();
    $x2temp = new Products();
    for ($i=0;$i<$x2->number;$i++)
    {
        $x2temp->put($x2->get($i));
    }
    $b= true;
    for ($i=0;$i<$x1->number;$i++)
    {
        for ($j=0;$j<$x2temp->number;$j++)
        {
            if ($x1->get($i)==$x2temp->get($j))
            {
                $x2temp->array[$j]=NULL;
                $x1temp->put($x1->get($i));
            }
        }
    }
    return $x1temp;
}

function filter($x,$A)
{
    $x1temp = new Products();
    for ($i=0;$i<$A->number;$i++)
    {
        //if (strlen ($x)==0) return $A;
        
        if ((strpos($A->get($i)->food, $x) !== false) || (strpos($A->get($i)->attr, $x) !== false))
        //if (($A->get($i)->food == $x)  || ($A->get($i)->attr == $x))
        {
            $x1temp->put($A->get($i));
        }
    }
    return $x1temp;
}

function inversefilter($x,$A)
{
    $x1temp = new Products();
    
    for ($i=0;$i<$A->number;$i++)
    {
        $b=true;
        // if (strlen ($x)==0) return $A;
         
        if (!((strpos($A->get($i)->food, $x) !== false) || (strpos($A->get($i)->attr, $x) !== false)))
        //if (!(($A->get($i)->food== $x)  || ($A->get($i)->attr == $x)))
        {
            $x1temp->put($A->get($i));
        }
         
    }
    return $x1temp;
    
}



?>