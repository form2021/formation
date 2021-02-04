# formation dev fullstack

    https://github.com/form2021/formation

## liveshare 04/02

https://prod.liveshare.vsengsaas.visualstudio.com/join?DF8437C5550097D96542B4BE23B4F6F52BAF

## questions

### .htaccess et apache

    le fichier .htaccess est un fichier de configuration pour apache.

    on installe des Rewrite Rules (règles de ré-écriture)
    https://httpd.apache.org/docs/2.4/fr/rewrite/intro.html

    # ...
    # SI L'URL DEMANDEE PAR LE NAVIGATEUR NE CORRESPOND 
    # NI A UN FICHIER NI A UN DOSSIER SUR LE SERVEUR
    # ALORS C'EST index.php QUI VA GERER LA REPONSE A RENVOYER AU NAVIGATEUR
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule . ./index.php [L]

## résumé de l'épisode précédent

    dans les projets web modernes
    * on met en place le .htaccess pour concentrer les requêtes du navigateur sur index.php
        => php prend la main sur les requêtes du navigateur
    * dans le monde php, on est passé en POO
        => on range notre code dans des classes
        => il va y avoir beaucoup de techniques en plus
            outils pour les entreprises pour gérer des projets avec des millions de ligne de code
            (devenu standard depuis les années 90...)
            => IMPORTANT POUR VOUS...
    * on installe le mécanisme de chargement automatique de classe
            => plus facile pour le développeur
            => plus efficace car PHP charge le code seulement quand il en a besoin

```php
<?php

class MaBoiteDeCode
{
    // METHODES DE CLASSE (static)
    static function afficherFooter ()
    {
        // LE DEV AJOUTE SON CODE ICI...
    }

    // METHODES D'OBJET (fonction rangée dans une classe)
    function afficherTitre ()
    {
        // LE DEV AJOUTE SON CODE ICI...
    }
}

// si static
MaBoiteDeCode::afficherFooter();    // :: OPERATEUR DE RESOLUTION DE PORTEE Paamayim Nekudotayim

// si méthode objet
$objet = new MaBoiteDeCode;         // new EST UN OPERATEUR QUI CREE UN OBJET A PARTIR D'UNE CLASSE
// UN OBJET EST UNE VALEUR
// => ON MEMORISE LA VALEUR DANS UNE VARIABLE
$objet->afficherTitre();            // -> EST UN OPERATEUR D'ACCES POUR LES OBJETS


```

## COURS POO: propriétés d'objets


```php
<?php


class MaClasse
{
   // PROPRIETES (static)   => COLLECTIF
   static $propStatic = "";
   
   // PROPRIETES D'OBJETS   => INDIVIDUEL
   public $propObjet = "";
   public $prop2     = "";

   // METHODES D'OBJETS
   function manipulerProp ()
   {
       // ECRITURE
       $this->propObjet = "nouvelle valeur par méthode objet";      
        // $this EST COMME UNE VARIABLE "SPECIALE"
        // PHP MET DANS $this L'OBJET QUI VA SERVIR A APPELER LA METHODE
   }

}

// static
// ECRITURE
MaClasse::$propStatic = "nouvelle valeur";

// LECTURE
echo MaClasse::$propStatic;

// -----------

// si pas static => on doit passer par un objet
$objet = new MaClasse;                  // PHP COPIE POUR L'OBJET TOUTES LES PROPRIETES D'OBJET
// ECRITURE
$objet->propObjet = "nouvelle valeur";  // PIEGE: pas de $ après ->
// LECTURE
echo $objet->propObjet;
// ON PEUT APPELER UNE METHODE AVEC L'OBJET
$objet->manipulerProp();        // PHP FAIT AUTOMATIQUEMENT $this = $objet



$objet2 = new MaClasse;
$objet2->propObjet = "nouvelle valeur différente";

echo $objet2->propObjet;                // "nouvelle valeur différente"

echo $objet->propObjet;                 // "nouvelle valeur"

// UN OBJET PERMET DE STOCKER PLUSIEURS INFORMATIONS DANS UN SEUL OBJET
// => EN PHP, ON A AUSSI LES TABLEAUX ASSOCIATIFS POUR FAIRE LA MEME CHOSE

```

## methodes magiques

    * documentation
    https://www.php.net/manual/fr/language.oop5.magic.php

    * en PHP __construct, __destruct, __toString, etc...

    * (en js... constructeur et destructeur... et aussi regarder les Proxy...)

### LA METHODE CONSTRUCTEUR __construct

```php
<?php

class User
{
    // PROPRIETE D'OBJET
    public $email   = "";
    public $pseudo  = "";
    // ... ON MODELISE TOUTES LES INFOS UTILES POUR LE PROJET

    // METHODE MAGIQUE CONSTRUCTEUR __construct
    // AUTOMATIQUEMENT, PHP VA APPELER CETTE METHODE QUAND ON FAIT new User
    function __construct ()
    {

    }
}

$auteur             = new User;             // PHP DECLENCHE LE CALLBACK __construct
$auteur->pseudo     = "jean";
$auteur->email      = "jean@mail.me";
// ...

$visiteur           = new User;             // PHP DECLENCHE LE CALLBACK __construct
$visiteur->pseudo   = "julie";
$visiteur->email    = "julie@mail.me";
// ...


```


```php
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

```


    PAUSE ET REPRISE A 11H15...


## CHECKPOINT AVEC LA POO

    * BEAUCOUP DE MECANISMES AUTOMATIQUES
        => ON CONNAIT LA POO OU PAS...

    * SEPARATION ENTRE CODER LA CLASSE ET UTILISER LA CLASSE
        => FACILE A UTILISER
        => DEPLACE LA DIFFICULTE DANS LE CODAGE DE LA CLASSE

    * BEAUCOUP DE CODE DISPATCHE DANS PLEIN DE FICHIERS DIFFERENTS
        => TEMPS D'ADAPTATION IMPORTANT QUAND ON DECOUVRE UN PROJET POO
        => POUR COMPENSER CETTE COMPLEXITE, ON RESPECTE LE MVC QUI DEFINIT L'ORGANISATION DU CODE





































