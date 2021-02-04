<?php

/*
EN PHP8: MEME MECANIQUE MAIS AVEC MOINS DE CODE

class User
{
    function __construct 
    (
        public $nom     = "",
        public $email   = "",
    )
    {

    }

    // AJOUTER VOS METHODES...
}

*/

class User
{

    // PROPRIETES D'OBJET
    public $nom     = "";
    public $email   = "";

    // CONSTRUCTEUR EST UNE METHODE/FONCTION QUI PEUT AVOIR DES PARAMETRES
    function __construct ($nom, $email)
    {
        // DEBUG
        echo "<h1>CONSTRUCTEUR</h1>";
        // ON PEUT INITIALISER LES PROPRIETES AVEC LES PARAMETRES
        $this->nom   = $nom;
        $this->email = $email;
    }

    // GENERALEMENT PAS UTILE 
    // (DEPANNAGE: PARFOIS UTILE POUR AJOUTER DU CODE A LA FIN DU PROGRAMME)
    function __destruct ()
    {
        // DEBUG
        echo "<h1>DESTRUCTEUR</h1>";
        // AJOUTER LE CODE NECESSAIRE
    }

    // METHODE D'OBJET
    function afficherInfos ()
    {
        echo "<article><h3>$this->nom</h3><p>$this->email</p></article>";
    }

}

$auteur = new User("jean", "jean@mail.me");         // PHP APPELLE AUTOMATIQUEMENT $auteur->__construct("jean", "jean@mail.me")

$visiteur = new User("julie", "julie@mail.me");     // PHP APPELLE AUTOMATIQUEMENT $auteur->__construct("julie", "julie@mail.me")

$auteur->afficherInfos();

$visiteur->afficherInfos();


// PHP FAIT LE MENAGE A LA FIN DU PROGRAMME
// PHP DETRUIT LES VARIABLES CREEES $auteur ET $visiteur
// PHP APPELLE AUTOMATIQUEMENT LES METHODES __destruct SUR CHAQUE OBJET
