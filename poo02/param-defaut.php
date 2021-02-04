<?php

function afficherTexte ($titre="valeur par défaut")
{
    echo "<h1>$titre</h1>";
}

// afficherTexte();
// Fatal error: Uncaught ArgumentCountError: Too few arguments to function afficherTexte()

// afficherTexte("coucou");
afficherTexte("ma valeur");

afficherTexte();