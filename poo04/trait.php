<?php

// ON N'UTILISE PAS class MAIS LE MOT trait
// DEV 1
// TRAVAILLE SUR LE FICHIER MonTrait.php
trait MonTrait
{
    // ON PEUT METTRE TOUT CE QU'ON FAIT AVEC UNE CLASSE
    // PROPRIETES

    // METHODES D'OBJET
    function faireTravail ()
    {
        echo "faireTravail";
    }

}

// DEV 2
// TRAVAILLE SUR LE FICHIER MonTrait2.php
trait MonTrait2
{
    // ON PEUT METTRE TOUT CE QU'ON FAIT AVEC UNE CLASSE
    // PROPRIETES

    // METHODES D'OBJET
    function faireTravail2 ()
    {
        echo "faireTravail2";
    }

}


// DEV 3
// SOLUTION
// JE CREE UNE CLASSE
// TRAVAILLE DANS LE FICHIER MaClasse.php
class MaClasse
{
    // ON COMPOSE LE CODE DE NOTRE CLASSE AVEC LES TRAITS
    use MonTrait, MonTrait2;       // ON RAMENE LE CODE DU TRAIT COMME SI C'EST DU CODE DE NOTRE CLASSE
}

// MAIS COMME UN trait N'EST PAS UNE CLASSE
// => ON NE PEUT PAS CREER UN OBJET A PARTIR DU trait
// $objet = new MonTrait;      // => ERREUR CAR new S'UTILISE AVEC UNE CLASSE
// Fatal error: Uncaught Error: Cannot instantiate trait MonTrait

// COMMENT JE FAIS SI JE VEUX APPELER LA METHODE faireTravail ???
$objet = new MaClasse;
$objet->faireTravail(); // JE PEUX UTILISER LA METHODE DU TRAIT GRACE AU use
echo "<hr>";
$objet->faireTravail2(); // JE PEUX UTILISER LA METHODE DU TRAIT GRACE AU use