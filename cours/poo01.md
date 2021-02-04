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

## TRANSITION ENTRE PROGRAMMATION FONCTIONNELLE ET PROGRAMMATION ORIENTE OBJET

    PROGRAMMATION PAR CLASSE (OU METHODES static)

```php
<?php

class Model
{
    // METHODES static => METHODE DE CLASSE
    static function connexionMysql ()
    {

    }

    // METHODES D'OBJET
    function envoyerRequeteSql()
    {

    }
}

$model = new Model;
$model->envoyerRequeteSql();

// ON PASSE PAR LA CLASSE POUR APPELER LA METHODE static
// ET ON UTILISE :: 
// https://www.php.net/manual/fr/language.oop5.paamayim-nekudotayim.php
Model::connexionMysql();

```

    PAUSE DEJEUNER ET REPRISE A 14H10...

## Model View Controller

    RECETTE POUR CONSTRUIRE LE MEILLEUR LOGICIEL EN MINIMISANT LES COUTS
    => RETOUR D'EXPERIENCE (PAS FORCEMENT D'EXPLICATION THEORIQUE)

    => DESIGN PATTERNS
        (EN FRANCAIS: SCHEMA DE CONCEPTION...)
        MA TRADUCTION PERSONNELLE: RECETTE DE FABRICATION

    SI VOUS ETES CURIEUX SUR LES DESIGN PATTERNS...
    https://designpatternsphp.readthedocs.io/en/latest/README.html

    LE Model View Controller (MVC) EST UN DESIGN PATTERN
    => RECOMMANDE SI ON CREE UN LOGICIEL
        * QUI STOCKE DES INFOS DANS UNE BASE DE DONNEES
        * QUI AFFICHE CES INFOS A DES UTILISATEURS NON TECHNIQUES
        * QUI PERMET AUX UTILISATEURS D'INTERAGIR AVEC LE LOGICIEL


    EN PRATIQUE: LE MVC CONSISTE A SEPARER VOTRE CODE EN 3 GRANDES PARTIES
    * COMMENT ON DECIDE QUEL CODE VA DANS QUELLE PARTIE ?

    * MODEL => MODELISATION
            => REPRESENTATION DU MONDE REEL DANS LE MONDE INFORMATIQUES
            => DONNEES
            => BASE DE DONNEES
            => MySQL DANS NOTRE CAS
            => LE CODE PHP QUI INTERAGIT AVEC MySQL EST DANS LA PARTIE MODEL

    * VIEW  => AFFICHAGE
            => PRESENTATION DES INFOS POUR LE VISITEUR
            => CREE DES PAGES HTML POUR LE VISITEUR
            => CODE TEMPLATES PHP POUR CREER DU CODE HTML
            => IL FAUT LE RANGER DANS LA PARTIE VIEW

    * CONTROLLER => VERIFIER/SECURISER        
            => SI UN VISITEUR PEUT ENVOYER AU SITE DES INFORMATIONS
            => TOUT CE QUI VIENT DE L'EXTERIEUR PEUT ETRE DANGEREUX
            => ATTAQUES PAR CHEVAL DE TROIE... XSS, INJECTION SQL, etc...
            => DES QUE ON A DU CODE PHP QUI GERE DES INFOS EXTERIEURES
                IL FAUT ETRE PARANO ET AJOUTER DES VERIFICATIONS
            => CE CODE PHP DOIT ETRE RANGE DANS LA PARTIE CONTROLLER


    MVC COTE FRONT  =>  HTML, CSS, JS
    Model           =>  HTML => CONTENU DE LA PAGE => DONNEES
    View            =>  CSS  => RENDU VISUEL
    Controller      =>  JS   => INTERACTION AVEC LE VISITEUR


    DANS ANGULAR MVVM => REACTIVITE
    Model => CENTRALISE LES DONNEES
    View  => AFFICHE LES DONNEES
    ViewModel => SI ON CHANGE LA VIEW ALORS AUTOMATIQUEMENT LE MODEL EST MIS A JOUR
                    (DOUBLE DATA BINDING...)
                    DOUBLE SYNCHRONISATION
                    ON CHANGE LE MODEL ALORS LES VIEWS SONT AUTOMATIQUEMENT MIS A JOUR
                    ON CHANGE L'AFFICHAGE ALORS LE MODEL EST AUTOMATIQUEMENT MIS A JOUR


## EN PRATIQUE: STRUCTURE MODERNE POUR UN PROJET WEB PHP

    EN PHP, ON PEUT CREER UN TEMPLATE PHP QUI SERA UTILISE POUR CREER PLUSIEURS PAGES POUR LE NAVIGATEUR
    article.php?id=1
    article.php?id=3

    ON PEUT POUSSER CETTE TECHNIQUE A L'EXTREME
    => ON VA UTILISER index.php COMME POINT D'ENTREE POUR TOUTES LES PAGES DU SITE

    ON MODIFIE LA CONFIGURATION DE APACHE
    POUR ENVOYER TOUTES LES REQUETES VERS index.php
    => ON UTILISE UN FICHIER .htaccess


    PAUSE ET REPRISE A 15H50...

    * .htaccess de WORDPRESS (MAIS MODIF DE DOSSIER POUR NOUS...)

```htaccess
# https://wordpress.org/support/article/htaccess/
# BEGIN WordPress

RewriteEngine On
RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

## SUR UN VRAI SITE
## https://monsite.fr/
## RewriteBase /

## DANS MON CAS
## http://localhost:8888/formation/blog-poo/
RewriteBase /formation/blog-poo/

RewriteRule ^index\.php$ - [L]

## SI L'URL DEMANDEE PAR LE NAVIGATEUR NE CORRESPOND 
## NI A UN FICHIER NI A UN DOSSIER SUR LE SERVEUR
## ALORS C'EST index.php QUI VA GERER LA REPONSE A RENVOYER AU NAVIGATEUR
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . ./index.php [L]

# END WordPress
```

    * .htaccess de Symfony (simplifié, rien à changer...)

```htaccess

<IfModule mod_rewrite.c>
    RewriteEngine On

    RewriteCond %{REQUEST_URI}::$0 ^(/.+)/(.*)::\2$
    RewriteRule .* - [E=BASE:%1]

    RewriteCond %{HTTP:Authorization} .+
    RewriteRule ^ - [E=HTTP_AUTHORIZATION:%0]

    RewriteCond %{ENV:REDIRECT_STATUS} =""
    RewriteRule ^index\.php(?:/(.*)|$) %{ENV:BASE}/$1 [R=301,L]

    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ %{ENV:BASE}/index.php [L]
</IfModule>

```



## BASE DE SITE

    3 PAGES
    * accueil       => URL      index.php
    * blog                      blog.php
    * contact                   contact.php

    

















































