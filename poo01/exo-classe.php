<?php

// PROGRAMMATION EN FONCTIONNEL
// ETAPE1: DECLARATION DE LA FONCTION
// => CODE EN ATTENTE
function afficherTitre ()
{
    echo "<h1>titre en fonctionnel</h1>";
}

// ETAPE2: APPEL DE LA FONCTION
// => PHP EXECUTE LE CODE RANGE DANS LA FONCTION
afficherTitre();

// PROGRAMMATION ORIENTE OBJET
// ETAPE1: DECLARATION DE LA CLASSE
// => CODE EN ATTENTE
class MaClasse
{
    // METHODE
    function afficherTitre ()
    {
        echo "<h1>titre en poo</h1>";
    }
    
}

// ETAPE2: APPEL DE LA METHODE
$objet = new MaClasse;      // JE CREE UN OBJET A PARTIR DE LA CLASSE
$objet->afficherTitre();    // ET ENSUITE JE PEUX APPELER LA METHODE EN PASSANT PAR L'OBJET

// AVEC SQL ET PDO => VOUS AVEZ CODE EN POO
// $pdo = new PDO;
// $pdo->prepare(...);

