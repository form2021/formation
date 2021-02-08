# formation dev fullstack

    https://github.com/form2021/formation

## liveshare

    lundi 08/02 (après-midi)

https://prod.liveshare.vsengsaas.visualstudio.com/join?358FE179CE442FEC21614909E0845C6712A7

## questions ??

## COURS POO (LA SUITE...)

    class
    méthodes
    propriétés
    static
    ::
    public  / protected / private
    objet
    new
    ->
    $this
    méthodes magiques
    __construct
    __destruct
    __toString
    ...

## VISIBILITE DES PROPRIETES / METHODES

    * documentation officielle
    https://www.php.net/manual/fr/language.oop5.visibility.php

    public
    protected
    private

```php
<?php

class User
{
    // propriétés d'objet
    public $name = "";          // on laisse un acces libre a la propriete
    public $age  = 0;
}

class Page
{
    // methode
    function afficherProfil ()
    {
        $user = new User;
        // ecriture
        $user->name = "bob";    // ok car public

        // lecture
        echo "mon nom est $user->name"; // ok car public

    }
}

$page = new Page;
$page->afficherProfil();

```


```php
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

```

### GETTERS ET SETTERS: MAUVAISE NOUVELLE...

    * IL Y A DES RECOMMENDATIONS OFFICIELLES SUR LES VISIBILITES
    => NE JAMAIS METTRE UNE PROPRIETE EN VISIBILITE public
    => ON MET SOIT protected SOIT private
    => MAITRISE D'OUVRAGE 
    => COMMENT IL FAUT ECRIRE LE CODE (RESPONSABLE QUALITE...)

    * LE DEV 
    => MAITRISE D'OEUVRE
    => DOIT SUIVRE LES RECOMMENDATIONS
    => MAIS DANS 99% DES CAS, ON NE MET JAMAIS DE CODE DE SECURITE...

    => SYMFONY SUIT LES RECOMMENDATIONS
    => PAS DE PROPRIETE EN public
        ET POUR CHAQUE PROPRIETE IL FAUDRA UNE METHODE GETTER ET UNE METHODE SETTER
    => PLEIN DE CODE POUR PAS GRAND CHOSE...

    => DANS LA REALITE, C'EST TELLEMENT INUTILE 
        QUE LES COMPILATEURS ENLEVENT LES GETTERS ET SETTERS ET REVIENNENT EN public
        (C++, Java, Objective-C, etc...)

```php
<?php

// DEV 3
class Security 
{
    static function isAccessOk ()
    {
        // ...
    }
}

// DEV 1
class User
{
    protected $name = "mon nom";
    // ...

    // methodes publique GETTER / lecture
    public function getName ()
    {
        return $this->name;     // ok car dans la meme classe

        // ICI ON POURRAIT DU CODE DE SECURITE...
        // if (Security::isAccessOk())
        //    return $this->name;     // ok car dans la meme classe
        // else 
        //    return "accès interdit";
    }

    // methodes publique SETTER / ecriture
    public function setName ($nouvelleValeur = "")
    {
        // ICI ON POURRAIT DU CODE DE SECURITE...
        $this->name = $nouvelleValeur;  // ok car on est dans la meme classe
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


```


    PAUSE ET REPRISE 11H25...


## HERITAGE ENTRE CLASSES

    https://www.php.net/manual/fr/language.oop5.inheritance.php

    TECHNIQUE FONDAMENTALE DANS LA POO
    (ATTENTION: ON AURA AUSSI UNE AUTRE TECHNIQUE PLUS MODERNE... traits...)

    PROBLEMATIQUE:
    D.R.Y.
    Don't
    Repeat
    Yourself

    => ESSAYER DE CENTRALISER LE CODE POUR NE PAS LE REPETER DANS DIFFERENTS FICHIERS

```php
<?php


// DEV COMMUN
class Annonce                       // CLASSE PARENTE
{
    // propriétés
    public $titre       = "";
    public $description = "";
    public $prix        = 0;

}

// LES CLASSES ENFANTS HERITENT DES PROPRIETES ET DES METHODES DE LA CLASSE PARENT

// DEV 1
class AnnonceImmo       // CLASSE ENFANT
    extends Annonce     // AVEC extends ON CREE UN LIEN D'HERITAGE ENTRE 2 CLASSES
{
    // propriétés
    public $surface     = 0;
    public $nbPiece     = 0;

    // methodes
}

// DEV 2
class AnnonceVoiture    // CLASSE ENFANT
    extends Annonce     // AVEC extends ON CREE UN LIEN D'HERITAGE ENTRE 2 CLASSES
{
    // propriétés
    public $marque          = "";
    public $moteur          = "";        // essence / diesel / etc...
    public $kilometrage     = 0;

    // methodes

}


$immo = new AnnonceImmo;
$immo->titre    = "3 pièces lumineux";  // ok grace a heritage avec Annonce
$immo->surface  = 50;



```


    RESUME SUR VISIBILITE
    * public        LE PLUS FACILE ACCES PARTOUT
    * protected     ACCES SEULEMENT DANS LA CLASSE OU DANS LES CLASSES ENFANTS
    * private       ACCES SEULEMENT DANS LA CLASSE (MAIS PAS DANS LES CLASSES ENFANTS)

    ET RECOMMENDATION DE LA MAITRISE D'OUVRAGE
    * LES PROPRIETES SONT SOIT protected OU private MAIS JAMAIS public
        => IL FAUT CREER DES GETTERS ET SETTERS en public...

## AIE... LES PROBLEMES AVEC L'HERITAGE...

    AVEC L'HERITAGE ON PEUT COMBINER LES CODES DE 2 CLASSES...
    MAIS ON PEUT CREER DES SCENARIOS BIZARRES...


### SURCHARGE DE METHODE (OVERRIDE EN PHP...)

    QUE SE PASSE-T-IL SI ON CREE 2 METHODES AVEC LE MEME NOM ?
    UNE DANS LA CLASSE ENFANT ET UNE AUTRE DANS LA CLASSE PARENT ?


```php
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

        // on peut executer le code dans la classe parent
        // bricolage pas cohérent car travailler n'est pas une méthode static
        // plus cohérent d'écrire parent->travailler();
        parent::afficher();

    }
}

$annonceVoiture = new AnnonceVoiture;

// ...


$annonceVoiture->afficher();    // ok car héritage
// COMME $annonceVoiture EST UN OBJET DE LA CLASSE AnnonceVoiture
// ALORS PHP UTILISE EN PRIORITE LA METHODE DE LA CLASSE ENFANT


```

    PAUSE DEJEUNER ET REPRISE A 14H05...

## EXOS

    * UTILISER UN ARTICLE COMME UNE PAGE (COMME WORDPRESS...)
        AJOUTER UNE PAGE credits EN AJOUTANT UNE LIGNE DANS LA TABLE SQL articles

    * SUR LA PAGE BLOG, ON NE VA PAS AFFICHER TOUS LES ARTICLES
        MAIS ON VA FILTRER POUR AFFICHER SEULEMENT LES ARTICLES DANS LA category = 'news'














