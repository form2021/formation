<?php

// tableau associatif
$tableauAsso = [
    "cle1"       => "valeur1",
    "cle2"       => "valeur2",
];

// ECRITURE
$tableauAsso["cle1"]    = "nouvelle valeur";
// LECTURE
echo $tableauAsso["cle1"];

echo "<hr>";

// EN POO
class MaClasse
{
    // PROPRIETES D'OBJET
    public $cle1 = "valeur1";
    public $cle2 = "valeur2";

}

// ECRITURE
$objet = new MaClasse;
$objet->cle1 = "nouvelle valeur propriété";
// LECTURE
echo $objet->cle1;
