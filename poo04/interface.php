<?php

// attention: on utilise interface et pas class
// LES 2 DEVS SE METTENT D'ACCORD SUR L'INTERFACE
interface MonInterface
{
    // DANS LES INTERFACES
    // ON NE MET QUE DES METHODES ABSTRAITES
    // AUCUN BLOC {}

    function faireTravail ();

    function afficherArticle ($param1, $param2="valeur par défaut");


    // ...
}

// AUCUN CODE CAR AUCUN {}
// AUCUN INTERET POUR LE DEV ???

// UTILITE
// => UN CONTRAT ENTRE DEVELOPPEURS
// => UN DEV VA CODER UNE CLASSE ET VA S'ENGAGER A RESPECTER LES METHODES DE L'INTERFACE
// => ENCORE UN NOUVEAU MOT implements

// Fatal error: Class MaClasse contains 2 abstract methods 
// and must therefore be declared abstract or implement the remaining methods 
// (MonInterface::faireTravail, MonInterface::afficherArticle)


// DEV 1 CODE LA CLASSE ET LE CODE DES METHODES
class MaClasse
    implements MonInterface
{
    function faireTravail()
    {
        // DEV 1 COMPLETE LE CODE MANQUANT
    }

    function afficherArticle($param1, $param2 = "valeur par défaut")
    {
        // DEV 1 COMPLETE LE CODE MANQUANT 
        echo "";       
    }
}


// DEV 2 UTILISE LA CLASSE ET LES METHODES
$objet = new MaClasse;
$objet->afficherArticle("valeur du param1");