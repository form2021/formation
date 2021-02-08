<?php

// code en attente
class User
{
    // propriétés d'objet
    public      $name   = "";             // on laisse un acces libre a la propriete
    protected   $age    = 0;
    private     $email  = "test@mail.me";

    // methodes d'objet 
    // sur les méthodes aussi on peut préciser la visibilité
    // par défaut => public
    function afficherInfos ()
    {
        // dans une méthode de la classe
        // on peut accéder à toutes les propriétés
        // ecriture
        $this->name     = "nouveau nom";
        $this->age      = 33;                   // ok car on est dans la meme classe
        $this->email    = "nouveau@mail.me";   // ok car on est dans la meme classe

        // lecture
        echo "mon nom est $this->name et j'ai $this->age ans et mon email est $this->email";
        // mon nom est nouveau nom et j'ai 33 ans et mon email est nouveau@mail.me

    }

    public function afficherName ()
    {
        echo $this->name;
    }

    // on ne va pas pouvoir appeler la méthode dans une autre classe
    protected function afficherProtected ()
    {
        echo $this->name;
    }

    // on ne va pas pouvoir appeler la méthode dans une autre classe
    private function afficherPrivate ()
    {
        echo $this->name;
    }

}

// code en attente
class Page
{
    // methode
    function afficherProfil ()
    {
        $user = new User;
        // ecriture
        $user->name = "bob";            // ok car public

        // lecture
        echo "mon nom est $user->name"; // ok car public    // mon nom est bob
        echo "<hr>";    // hr => horizontal rule (ligne horizontale)

        // on peut appeler la méthode afficherInfos sur $user
        $user->afficherInfos();
        echo "<hr>";    // hr => horizontal rule (ligne horizontale)
        $user->afficherName();

        // $user->afficherProtected();
        // Fatal error: Uncaught Error: Call to protected method User::afficherProtected()
        // $user->afficherPrivate();
        // Fatal error: Uncaught Error: Call to private method User::afficherPrivate()

        // ecriture
        // $user->age = 20;                // erreur car protected
        // Fatal error: Uncaught Error: Cannot access protected property User::$age

        // echo $user->age;
        // Fatal error: Uncaught Error: Cannot access protected property User::$age

        // ecriture
        // $user->email = "nouveau@mail.me";
        // Fatal error: Uncaught Error: Cannot access private property User::$email

        // lecture
        // echo $user->email;
        // Fatal error: Uncaught Error: Cannot access private property User::$email
    }
}

// on démarre l'exécution du code ici
$page = new Page;
$page->afficherProfil();
