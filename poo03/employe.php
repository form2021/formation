<?php

class Employe
{
    private $salaireBase = 1000;
    public $cotisation = 200;

    // methodes 
    public function calculerTotal ()
    {
        // $total est une variable locale a la methode calculerTotal
        $total = $this->salaireBase + $this->cotisation;
        return $total;
    }
}

class Commercial
    extends Employe
{
    public $prime = 500;  
    
    function calculerTotalAvecPrime ()
    {
        $totalAvecPrime = $this->prime + $this->calculerTotal(); // ok car methode calculerTotal est public et heritage
        return $totalAvecPrime;
    }
}

$commercial = new Commercial;
echo $commercial->calculerTotal();      // ok car methode est public et heritage entre Commercial et Employe
echo "<hr>";
echo $commercial->calculerTotalAvecPrime();
