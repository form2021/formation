# formation dev fullstack

    https://github.com/form2021/formation

## liveshare 03/02

https://prod.liveshare.vsengsaas.visualstudio.com/join?A51511EFD7786F26AC5EF0F01FC8DB5F0081

## horaires

09H00-17H00
11H00-11H15         pause café
13H00-14H00         dejeuner
15H30-15H45         pause gouter

## présentation

Long Hai
46 ans
commencé à coder +35 ans (amstrad 464cpc)
diplomé ingénieur logiciel (1998) +20ans
freelance depuis 2007 (14 ans)
ouverture 3wa (en 2014)
=> formation intensive dev fullstack

poo 
symfony

équipes pour les projets
* 3/4 personnes par équipe
* définir un projet (avec symfony...)
* PDF WF3 qui donne le cahier des charges (à demander...)

évaluation 23/02

## poo / mvc

    DOCUMENTATION OFFICIELLE
    https://www.php.net/manual/fr/language.oop5.php


### introduction à la Programmation Orienté Objet (POO)

    programmation fonctionnelle
    => créer des fonctions et les appeler
    => années 80
    => volume de code 
    => permet de gérer autour 10.000 lignes de code (100x100 => 10.000)


```php
<?php

// ETAPE 1 : déclarer/créer une fonction
function afficherTexte ()
{
    // LE DEV RANGE SON CODE DANS DES FONCTIONS
    // ...
}

function afficherFooter ()
{
    // LE DEV RANGE SON CODE DANS DES FONCTIONS
    // ...
}

// ETAPE 2 : appeler la fonction
afficherTexte();

```

    => années 90
    => on a besoin de programmes en 100.000 ou 1.000.000 de lignes de code
    => la POO fournit les outils pour gérer ces volumes de code

    un dev devrait écrire autour de 400 lignes de code par jour.
    => 1/3 du temps de travail sur la journée
    => il faut réfléchir avant
    => il faut vérifier/tester après

    1 semaine => 5 jours => 5x400 = 2.000 lignes de code
    1 an => 50 semaines => 50x2.000 = 100.000 lignes de code par an et par dev

    AVEC LA POO 100 x 100 x 100 => 1.000.000 lignes de code
    => pour les entreprises la programmation fonctionnelle ne suffit pas
    => la POO va apporter les outils pour gérer des millions de lignes de code

    La POO apporte aux entreprises des outils et des techniques pour des projets de millions de ligne de code.
    => important pour le dev

    * le "no code" ou "low code"
    => pouvoir gérer des grands volumes de fonctionnalités sans coder
        (par assemblage)

    * éco-conception
    => optimiser le code pour ne garder que le strict nécessaire

    PAUSE ET REPRISE A 11H20...


## les classes en POO

    dans la POO, on commence par créer des classes...
    => une classe est une "boite" pour ranger nos fonctions...

    en anglais "class" veut dire "groupe"

```php
<?php

// ETAPE 1: DECLARATION DE LA CLASSE
// => LE CODE EST EN ATTENTE D'ETRE EXECUTE
class MaClasse
{
    // PROPRIETES OU ATTRIBUTS => VARIABLES RANGEES DANS UNE CLASSE
    // on va pouvoir ranger des variables dans la classe
    static $titre = "le titre du site";

    // METHODES => UNE FONCTION RANGEE DANS UNE CLASSE
    // on va ranger nos fonctions
    function afficherTitre ()
    {
        // le dev écrit son code ici...
    }    

    function afficherContenu ()
    {
        // le dev écrit son code ici...
    }

}

// ETAPE 2: APPELER LA METHODE
// => ON DOIT CREER UN OBJET ET ENSUITE ON PEUT UTILISER L'OBJET POUR APPELER LA METHODE
$objet = new MaClasse;      // new EST UN OPERATEUR D'INSTANCIATION => new CREE UN OBJET A PARTIR DE LA CLASSE
$objet->afficherTitre();    // -> ON PASSE PAR L'OBJET POUR APPELER LA METHODE

// UN OBJET EST UNE VALEUR CREEE A PARTIR D'UNE CLASSE
// => LA POO EST PLUS LOURD A ECRIRE POUR LE DEV QUE LA PROGRAMMATION FONCTIONNELLE

```

## organisation du code en POO avec PHP

    EN PHP, ON VA RANGER CHAQUE CLASSE DANS UN FICHIER DIFFERENT
    EN RESUME: UNE CLASSE => UN FICHIER .php

    EXEMPLE: SI ON A UNE CLASSE MaClasse ON VA RANGER SON CODE DANS UN FICHIER MaClasse.php

    => ON VA PROFITER D'UN MECANISME AUTOMATIQUE DE PHP 
    => CHARGEMENT AUTOMATIQUE DE CLASSE

    => ON VA CREER UNE FONCTION DE CALLBACK QUI VA FAIRE require
    => ET UNE FOIS QU'ON A INSTALLE LE MECANISME, PHP VA LE DECLENCER TOUT SEUL
    => COOL POUR LE DEV ;-p

    => DOUBLE EFFET KISSCOOL
    => PLUS FACILE POUR LE DEV
    => PLUS EFFICACE CAR PHP NE CHARGERA LE CODE QUE SI IL EN A BESOIN

    


























