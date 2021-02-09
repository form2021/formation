<?php

// code en attente
class MaClasse
{
    // ok car methode = fonction rangee dans une classe
    static function faireUnTruc ()
    {
        echo "<h3>faireUnTruc</h3>";

        // ok car on definit la fonction quand on appelle la methode faireUnTruc
        function faireTest ()
        {
            echo "test";
        }

        // ko car methode rangee dans une methode
        // Parse error: syntax error, unexpected identifier "faireAutreChose"
        // static function faireAutreChose ()
        // {

        // }

    }
}

// appeler la fonction
// Fatal error: Uncaught Error: Call to undefined function faireTest()
// faireTest();

MaClasse::faireUnTruc();
// => cet appel de fonction définit la fonction faireTest
// => donc maintenant je peux appeler la fonction faireTest

faireTest();
