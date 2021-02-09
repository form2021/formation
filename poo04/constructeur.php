<?php

class MaClasse
{

    // methode contructeur => fonction callback
    // => je definis la fonction __construct mais c'est PHP qui va l'appeler
    // optionnel
    function __construct ()
    {
        // debug
        echo "PHP a appelé tout seul la fonction callback __construct";
    }
}

$objet = new MaClasse;  // PHP APPELLE AUTOMATIQUEMENT LA FONCTION CALLBACK __construct


class Section 
{
    function __construct()
    {
        echo "<h3>__construct</h3>";
    }
}

$section1 = new Section;    // PHP appelle $section1->__construct() automatiquement
$section2 = new Section;    // PHP appelle $section1->__construct() automatiquement
