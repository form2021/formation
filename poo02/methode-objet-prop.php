<?php

// (TABLE SQL)
class User
{
    // PROPRIETE OBJET      (COLONNES SQL)
    public $nom = "jeffrey";
    public $age = 20;

    // METHODE D'OBJET
    function sePresenter ()
    {
        // DANS UNE METHODE D'OBJET PHP CREE AUTOMATIQUEMENT $this
        // ET $this CONTIENT L'OBJET QUI VA SERVIR A APPELER LA METHODE
        echo "<h1>bonjour, je m'appelle $this->nom</h1>";
    }
}

// (LIGNES SQL)
$user1 = new User;
$user1->sePresenter();      // bonjour, je m'appelle jeffrey
    // PHP FAIT $this = $objet

$user2 = new User;
$user2->nom = "christine";
$user2->sePresenter();      // bonjour, je m'appelle christine

