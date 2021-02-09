<?php

// DEV 1
// code inutilisable sans ajouter un code complémentaire
// abstract => bloque l'utilisation de son code
abstract class MaClasse
{
    // methodes
    // on peut declarer une methode asbtraite sans {}
    abstract function faireTravail ();
    
    // abstract function ajouterPile ();

    // methodes classiques
    function afficherTitre ()
    {
        echo "<h3>titre</h3>";
    }

}

// DEV 2
// POUR DEBLOQUER LA SITUATION
// => ON CREE UNE CLASSE ENFANT
class MonEnfant
    extends MaClasse
{
    // ICI ON VA SURCHARGER LA METHODE ABSTRAITE (OVERRIDE)
    // en enlevant le mot abstract et en ajoutant le bloc {}
    function faireTravail ()
    {

    }

}

// on ne peut pas créer d'objet à partir d'une classe abstraite
// $objet = new MaClasse;  // => erreur
// Fatal error: Uncaught Error: Cannot instantiate abstract class MaClasse

$objet = new MonEnfant;
// comment je fais si j'ai besoin d'appeler la méthode afficherTitre 
$objet->afficherTitre();    //ok car heritage entre MonEnfant et MaClasse
