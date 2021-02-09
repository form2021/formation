<?php

interface Contrat 
{
    // ON S'ENGAGE A FOURNIR LES METHODES SUIVANTES
    static function lireArticle ($colonne, $valeurCherchee);

    // ...
    function faireClauseBlaBla ();
    // Fatal error: Class Model contains 1 abstract method 
    // and must therefore be declared abstract 
    // or implement the remaining methods (Contrat::faireClauseBlaBla)

}