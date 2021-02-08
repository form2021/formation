<?php
// DEV 3
class Security 
{
    static function isAccessOk ()
    {
        // ...
        // return true;        // user est connecté
        return false;
    }
}


// DEV 1
class User
{
    protected $name = "mon nom";

    // methodes publique GETTER / lecture
    public function getName ()
    {
        // ICI ON POURRAIT DU CODE DE SECURITE...
        if (Security::isAccessOk())
            return $this->name;     // ok car dans la meme classe
        else 
            return "accès interdit";

        // return $this->name;     // ok car dans la meme classe
    }

    // methodes publique SETTER / ecriture
    public function setName ($nouvelleValeur = "")
    {
        if (Security::isAccessOk())
            $this->name = $nouvelleValeur;     // ok car dans la meme classe
        
        //    $this->name = $nouvelleValeur;  // ok car on est dans la meme classe
    }
}

// DEV 2
class Page
{
    // methode
    function afficherProfil ()
    {
        // SI JE VEUX ECRIRE OU LIRE DANS LA PROPRIETE name
        // COMMENT JE FAIS ?
        $user = new User;
        $user->setName("nouveau nom");  // PHP FAIT $nouvelleValeur = "nouveau nom"
        echo $user->getName();

    }
}


$page = new Page;
$page->afficherProfil();