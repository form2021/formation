# formation dev fullstack

    https://github.com/form2021/formation

## liveshare

    mardi 09/02
    
https://prod.liveshare.vsengsaas.visualstudio.com/join?493F069A081AEEF55D3377E71CC1ADB840F4


## questions ??

## résumé rapide des épisodes précédents

    class           pour créer une classe
    static          pour décider si une méthode ou une propriété est collective (commune à la classe)
    ::              opérateur de résolution de portée pour accéder aux méthodes/propriétés static dans une classe
    new             opérateur d'instanciation (pour créer un objet à partir de la classe)
    __construct     méthode magique callback qui est appelée par PHP quand on fait un new
    ->              opérateur d'accès (pour accéder à une méthode ou une propriété dans un objet)
    public          visibilité sur les propriétés et méthodes (partout)
    protected       visibilité seulement dans la classe et dans les classes enfant
    private         visibilité seulement dans la classe
    extends         héritage entre une classe parent et une classe enfant
    getters         méthodes lecture / on ne devrait jamais avoir de propriété en public (recommendation officielle)
    setters         méthodes écriture / on ne devrait jamais avoir de propriété en public (recommendation officielle)

## ENCORE PLUS LOIN DANS LES DELIRE DE LA POO...

### CLASSES ABSTRAITES

    * DOCUMENTATION OFFICIELLE
    https://www.php.net/manual/fr/language.oop5.abstract.php

    PAS TRES SOUVENT UTILISE
    (MAIS DANS SYMFONY OUI...)

```php
<?php
abstract class MaClasse
{
    // methodes
    // on peut declarer une methode asbtraite sans {}
    abstract function faireTravail ();
    
    // methodes classiques
    function afficherTitre ()
    {
        echo "<h3>titre</h3>";
    }

}

// on ne peut pas créer d'objet à partir d'une classe abstraite
$objet = new MaClasse;  // => erreur

```

    * solution créer une classe enfant

```php
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

```

### LES INTERFACES

    * DOCUMENTATION OFFICIELLE
    https://www.php.net/manual/fr/language.oop5.interfaces.php

    FAIT PARTIE DES SPECIFICATIONS SUR LES GROS PROJETS
    => CONTRAT LEGAL A RESPECTER

```php
<?php

// attention: on utilise interface et pas class
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


```

    * on s'engage à respecter une interface comme un contrat

```php
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

```

### ENFIN UN TRUC UTILE... LES TRAITS

    * DOCUMENTATION OFFICIELLE
    https://www.php.net/manual/fr/language.oop5.traits.php


    ALTERNATIVE PLUS MODERNE (UNE DIZAINE D'ANNEES...)
    POUR REMPLACER L'HERITAGE

    POUR L'HERITAGE, SUR LE LONG TERME L'HERITAGE CREE DES LIENS TROP FORTS ENTRE LES CLASSES
    (DIFFICILE DE FAIRE EVOLUER LE CODE...)

    CHOIX ENTRE HERITAGE vs COMPOSITION
    => DANS PHP, LA COMPOSITION SE FAIT AVEC LES TRAITS
    => GENERALEMENT UN MEILLEUR CHOIX QUE L'HERITAGE

    ATTENTION: ON A DES SCENARIOS A PROBLEMES... EVITER CES SCENARIOS COMPLIQUES

```php
<?php

// ON N'UTILISE PAS class MAIS LE MOT trait
trait MonTrait
{
    // ON PEUT METTRE TOUT CE QU'ON FAIT AVEC UNE CLASSE
    // PROPRIETES

    // METHODES
    function faireTravail ()
    {
        echo "faireTravail";
    }

}

// MAIS COMME UN trait N'EST PAS UNE CLASSE
// => ON NE PEUT PAS CREER UN OBJET A PARTIR DU trait
$objet = new MonTrait;      // => ERREUR



```

    * COMPOSITION AVEC DES TRAITS

```php
<?php

// ON N'UTILISE PAS class MAIS LE MOT trait
// DEV 1
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
```

## DANS UN FRAMEWORK

    SI LE FRAMEWORK FOURNIT UNE CLASSE
    => ON PEUT FAIRE DE L'HERITAGE SUR LA CLASSE


    SI LE FRAMEWORK FOURNIT UN TRAIT
    => ON PEUT FAIRE DE LA COMPOSITION SUR LE TRAIT

```php
<?php
// CODE FOURNI PAR LE FRAMEWORK
trait MonModule
{
    // METHODE
    function faireTravail ()
    {
        // CODE DEJA FAIT QUE JE VEUX
    }
}

// DEV QUI UTILISE FRAMEWORK
// => SI JE VEUX APPELER LA METHODE faireTravail
class MonCode
{
    use MonTrait;   // CAR LA METHODE faireTravail EST DANS UN TRAIT
}
$objet = new MonCode;
$objet->faireTravail();

```


    PAUSE ET REPRISE A 11H25...

## SYNTHESE POO

    * principe général: on range notre code
    * boite 1: les classes
    * en php: on va ranger une classe MaClasse dans son fichier MaClasse.php
    * explication: cela permet le chargement automatique de classe par PHP

    * dans une classe: on faire créer des méthodes et des propriétés
    * est-ce que je fais du static ou pas ?

            si on fait des methodes static  
            => pour appeler la methode, on passe par la classe
            MaClasse::faireTravail()

            si on fait des methodes d'objet
            => pour appeler la methode, on doit d'abord créer un objet
            $objet = new MaClasse;
            $objet->faireTravail2();

            avantage des méthodes d'objet, c'est qu'on peut utiliser $this
            $this est une variable spéciale qui permet d'accéder aux propriétés d'objet
        
    * propriétés d'objet
        on les définit dans la classe
        mais quand on fait une instanciation avec new
        alors PHP crée pour chaque objet son jeu de propriétés

```php
<?php

class MaClasse
{
    // ranger votre code ici
    // propriété d'objet
    public $nom = "";

    // méthode = fonction rangée dans une classe
    static function faireTravail ()
    {
        // ecrire notre code ici...   
    }

    function faireTravail2 ()
    {
        // ecrire notre code ici...   
    }

}

$objet = new MaClasse;      // $objet->nom est ""
$objet->nom = "nom1";       // $objet->nom est "nom1"  on a une première variable nom qui est dans $objet   

$objet2 = new MaClasse;
$objet2->nom = "nom2";      // on a une 2è variable nom qui est dans $objet2

echo $objet->nom;           // "nom1"


class MaClasse2
{
    // methodes
    function afficherContenu ()
    {
        // ...
    }
}

```

    * techniques pour travailler en équipe
            chaque dev travaille sur ses fichiers
            => comment interagir entre les différentes classes ?
    * héritage entre classes
    * classes abstraites
    * interfaces
    * traits

    attention: tout pourrait se combiner...


```php
<?php

// DEV 1
class MonCodeParent
{
    // methodes
    function faireBoulot1 ()
    {
        // ...
    }
}

// DEV 2
// IL VEUT UTILISER LE CODE DE DEV 1
class MonCodeEnfant
    extends MonCodeParent
{
    // methodes
    function faireBoulot2 ()
    {
        // ici on peut faire à faireBoulot1
        $this->faireBoulot1();
    }
}


```

    * code horrible
```php
<?php

// fichier CodeParent.php
class CodeParent
{

}

// fichier MonContrat.php
interface MonContrat
{

}

// fichier MonTrait1.php
trait MonTrait1
{

}

// fichier MonTrait2.php
trait MonTrait2
{

}

class CodeEnfant
    extends CodeParent
    implements MonContrat
{
    use MonTrait1, MonTrait2;
}

$objet = new CodeEnfant;
$objet->faireTravail();     // D'OU VIENT LA METHODE faireTravail ???


```



    FRAMEWORK
    FRAME   CADRE       => CONTRAINTE, PAS TROP DE CHOIX...
    WORK    TRAVAIL

    SYMFONY EST UN FRAMEWORK
    => SYMFONY "IMPOSE" SA MANIERE DE TRAVAILLER...

    LARAVEL ET VUE PEUVENT TRES BIEN TRAVAILLER ENSEMBLE...

## NAMESPACE

    * BOITES POUR RANGER LES CLASSES...

    https://www.php.net/manual/fr/language.namespaces.definitionmultiple.php



## SITE POUR TESTS ET APPRENTISSAGE PROGRAMMATION

    * POUR JS
    https://codecombat.com/

    * POUR TESTS RECRUTEMENT
    https://www.codingame.com/start

    * CORRIGES CONCOURS MEILLEUR DEV OU BATTLEDEV, etc...
    https://www.isograd.com/FR/solutionconcours.php


    PAUSE DEJEUNER ET REPRISE 14H10...

## ACTIVITES POUR CET APRES-MIDI

    * continuer sur le projet blog-poo
        (dont exos...)

 ## EXOS POUR PRATIQUER

    * AJOUTER SUR LA PAGE D'ACCUEIL PLUSIEURS SECTIONS
        EXEMPLE: PAGE DE CV
        AJOUTER UNE SECTION COMPETENCES OU ON AFFICHE LES ARTICLES DANS LA CATEGORIE "competences"
        AJOUTER UNE SECTION PROJETS OU ON AFFICHE LES ARTICLES DANS LA CATEGORIE "projets"

    * AJOUTER LE CODE PHP POUR RENDRE LE MENU PRINCIPAL DYNAMIQUE (DANS LE HEADER)
        ON VEUT CONSTRUIRE UN MENU AVEC DES ARTICLES QUI SERONT DANS LA CATEGORIE "menu"

    * AJOUTER DANS LE FORMULAIRE L'UPLOAD DE FICHIER...    
   
    Content
    Management
    System

    Système de Gestion de Contenu
    => UN UTILISATEUR NON DEV PEUT GERER LE CONTENU DE SON SITE SANS DEMANDER A UN DEV...
    => WordPress...



    PAUSE ET REPRISE A 15H55










    








































