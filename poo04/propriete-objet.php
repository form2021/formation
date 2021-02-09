<?php

// declaration
class User
{
    // propriété d'objet
    public $nom = "valeur par défaut";
}

$user1 = new User;      // instanciation
echo $user1->nom;       // "valeur par défaut"

echo "<hr>";
$user1->nom = "georges";
echo $user1->nom;       // "georges"

echo "<hr>";
$user2 = new User;
echo $user2->nom;       // "valeur par défaut"

echo "<hr>";
$user2->nom = "julie";
echo $user2->nom;       // "julie"

echo "<hr>";
echo $user1->nom;       // "georges"


class Magicien
{
    public $nom         = "";
    public $pointVie    = 100;
    public $pointMagie  = 100;

    function __construct($nom="", $pv=100, $pm=100)
    {   
        $this->nom = $nom;
        $this->pointVie = $pv;
        $this->pointMagie = $pm;
    }
}

// $votrePerso = new Magicien;
// $votrePerso->nom = "gandalf";
// $votrePerso->pointVie = 1000;
// $votrePerso->pointMagie = 10000000;
$votrePerso = new Magicien("gandalf", 1000, 1000000);

$autreJoueur = new Magicien;
$autreJoueur->nom = "saroumane";
$autreJoueur->pointVie = 2000;
$autreJoueur->pointMagie = 10000;

// DANS MON PROJET IL Y A DES ... 
//      produits
//      utilisateurs
//      guerriers
// => DANS MON CODE IL Y A UNE CLASSE ...
//      Produit
//      User
//      Guerrier

// INTERET PRATIQUE DE LA POO
// $objet   ->  methode     ("param1", "param2");

// DANS LE LANGAGE NATUREL
// ON FAIT DES PHRASES
//  SUJET       VERBE       COMPLEMENT

// EXEMPLE
// MON SITE DOIT AFFICHER UNE GALERIE
// POURRAIT SE TRADUIRE PAR DU CODE
// $site -> afficher ("galerie");
// => PRODUCTION AUTOMATIQUE DE CODE
// UML (Unified Modelling Language)
// Rational Rose


























