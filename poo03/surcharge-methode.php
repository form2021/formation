<?php

class Annonce       // CLASSE PARENT
{
    // méthode
    function afficher ()
    {
        echo "On est dans la méthode du parent...";
    }
}

class AnnonceVoiture    // CLASSE ENFANT
    extends Annonce     // HERITAGE AVEC LA CLASSE PARENT Annonce
{
    // méthode
    function afficher ()
    {
        echo "On est dans la méthode de l'enfant...";
    }
}

$annonceVoiture = new AnnonceVoiture;

// ...


$annonceVoiture->afficher();    // ok car héritage
// COMME $annonceVoiture EST UN OBJET DE LA CLASSE AnnonceVoiture
// ALORS PHP UTILISE EN PRIORITE LA METHODE DE LA CLASSE ENFANT
