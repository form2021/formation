# formation dev fullstack

    https://github.com/form2021/formation

## liveshare

    mercredi 10/02

https://prod.liveshare.vsengsaas.visualstudio.com/join?B7391B28D873700375CA86460170EC9CFADB

## questions ??

## Symfony - jour 01

    * site officiel
    https://symfony.com/

    * architecture modulaire
    * on peut utiliser chaque composant indépendamment (cool)
    https://symfony.com/components

    https://symfony.com/why-use-a-framework

    https://symfony.com/explained-to-a-developer

    * DOCUMENTATION OFFICIELLE
    https://symfony.com/doc/current/index.html

    * DERNIER BOUQUIN ECRIT PAR FABIEN POTENCIER
    https://symfony.com/doc/5.0/the-fast-track/fr/index.html


## HISTORIQUE DE SYMFONY

    FRAMEWORK PHP EN MVC
    Model
    View 
    Controller

    FrameWork
    Frame   => CADRE
    Work    => TRAVAIL
    => ORGANISATION DU CODE EN MVC
    => BIBLIOTHEQUE DE CODE EN POO (PROGRAMMATION ORIENTE OBJET)

    PREMIERE VERSION EN 2005
    OPEN SOURCE
    LICENCE MIT

    CREE PAR FABIEN POTENCIER (FRANCAIS !)
    SENSIO LABS => ENTREPRISE QUI EST DERRIERE LE DEV DE SYMFONY
    PAYANT => PRESTATION DE SERVICES, FORMATION ET CERTIFICATIONS 

    * LES RELEASES
    https://symfony.com/releases

    * V1    2005
    * V2    2011        VERSION QUI REND SYMFONY POPULAIRE
                            TOUT EST BUNDLE (MODULES)   => LOURD POUR LES DEVS
    * V3    2015        VERSION SIMPLIFIEE CAR V2 EST TROP COMPLIQUEE
                            UN SEUL BUNDLE SUFFIT       => LE DEV NE CREE QU'UN SEUL BUNDLE POUR LE PROJET
    * V4    2017        VERSION SIMPLIFIEE CAR V3 EST TROP COMPLIQUEE
                            LE BUNDLE EST DEJA CREE A L'INSTALLATION 
                            => LE DEV DOIT JUSTE RAJOUTER SON CODE DANS LE BUNDLE
                            INSTALLATION MINIMALISTE POSSIBLE (30% D'UN SYMFONY V3)
                        => VERSION IMPORTANTE EN TERME DE FONCTIONNALITES

    * V5    2019        VERSION CONSOLIDEE DE V4 (PROCHE DE LA V4...)
    * V5.2  2020/NOV    VERSION ACTUELLE

    SEMANTIC VERSIONING
    VERSION MAJEUR.MINEUR.DEBUG
    V1.0    V1.1    V1.2.0  V1.2.1  etc...
    V2
    V3
    V4
    V5

    ATTENTION: QUAND ON PASSE D'UNE VERSION MAJEURE A LA SUIVANTE
    => IL SE PEUT QUE LE PROJET CASSE ET IL FAUT PREVOIR DU TEMPS POUR ADAPTER LE CODE...

    DANS SYMFONY, ON A DES VERSIONS LTS (Long Term Support)

    POUR LES ENTREPRISES, 2 STRATEGIES POSSIBLES
    * SI LE PROJET EST STABLE, PASSER TOUS LES 3 ANS D'UNE LTS A LA SUIVANTE
    * SI LE PROJET A BESOIN DE NOUVEAUTES PLUS RAPIDEMENT
        => PASSER TOUS LES 6 MOIS D'UNE VERSION MINEURE A LA SUIVANTE

    ACTUELLEMENT LA LTS EST V4.4
    MAIS LA VERSION DEV STABLE EST 5.2
    => CA VA, ENTRE LA V4 ET LA V5, IL N'Y A PAS TROP DE DIFFERENCES... ;-p

## CONCURRENCE ENTRE FRAMEWORKS


    https://kinsta.com/fr/blog/frameworks-php/

    AU NIVEAU INTERNATIONAL
    * LARAVEL LE PLUS POPULAIRE
        https://laravel.com/
        COEUR DE CIBLE POUR LES PETITS ET MOYENS PROJETS
        LARAVEL UTILISE DES COMPOSANTS SYMFONY
        V1 SORTIE EN 2011 (QUAND V2 SYMFONY EST SORTIE...)
        PLUS SIMPLE ET PLUS EFFICACE QUE SYMFONY
    * SYMFONY
        COEUR DE CIBLE POUR LES GROS PROJETS
    * ...

    AU NIVEAU FRANCE
    * SYMFONY EST PLUS POPULAIRE QUE LARAVEL

## INSTALLATION DE SYMFONY

    https://symfony.com/doc/current/setup.html

    VERIFIER LA VERSION DE PHP
    OUVRIR UN TERMINAL DANS VSCODE ET ENTRER LA LIGNE

    php -v

    ENSUITE ON A BESOIN DE COMPOSER 2

    composer -v

    INSTALLATION 

    DANS VSCODE OUVRIR LE DOSSIER www/
    ET ENSUITE OUVRIR UN TERMINAL

    VERIFIER QUE VOTRE TERMINAL EST DANS LE DOSSIER www

    ET ENSUITE LANCER LA LIGNE DE COMMANDE

    composer create-project symfony/website-skeleton symfony

    SI ON VEUT INSTALLER UN 2E PROJET SYMFONY

    composer create-project symfony/website-skeleton symfony2

    PAUSE ET REPRISE A 11H20...



    Some files may have been created or updated to configure your new packages.
    Please review, edit and commit them: these files are yours.

    Some files may have been created or updated to configure your new packages.
    Please review, edit and commit them: these files are yours.


    What's next? 


    * Run your application:
        1. Go to the project directory
        2. Create your code repository with the git init command
        3. Download the Symfony CLI at https://symfony.com/download to install a development web server

    * Read the documentation at https://symfony.com/doc


    What's next? 


    * You're ready to send emails.

    * If you want to send emails via a supported email provider, install
        the corresponding bridge.
        For instance, composer require mailgun-mailer for Mailgun.

    * If you want to send emails asynchronously:

        1. Install the messenger component by running composer require messenger;
        2. Add 'Symfony\Component\Mailer\Messenger\SendEmailMessage': amqp to the
        config/packages/messenger.yaml file under framework.messenger.routing
        and replace amqp with your transport name of choice.


    Database Configuration


    * Modify your DATABASE_URL config in .env

    * Configure the driver (postgresql) and
        server_version (13) in config/packages/doctrine.yaml


    How to test?


    * Write test cases in the tests/ folder
    * Run php bin/phpunit

## ORGANISATION DES DOSSIERS DANS SYMFONY

    SYMFONY SUIT LE DECOUPAGE EN MVC...

    vendor/             => NE PAS TOUCHER   CODE LIBRAIRIES DONT SYMFONY
    src/
    src/Controller/     => CODE DE LA PARTIE CONTROLLER
    src/Entity/         => CODE DE LA PARTIE MODEL
    templates/          => CODE DE LA PARTIE VIEW

    ET ON VA AUSSI TRAVAILLER DANS LE DOSSIER
    public/

    LE DOSSIER public/ EST LA RACINE DE VOTRE SITE
    ET public/index.php     => EST LE POINT D'ENTREE UNIQUE

    A L'INSTALLATION, IL MANQUE LE FICHIER public/.htaccess
    => IL VA FALLOIR LE RAJOUTER

    VERIFIER QUE LA PAGE D'ACCUEIL S'AFFICHE CORRECTEMENT
    http://localhost:8888/symfony/public/


    POUR LA CONFIGURATION DE NOTRE PROJET, ON AURA AUSSI BESOIN DE TRAVAILLER
    AVEC LE DOSSIER config/
    AVEC LE FICHIER .env


## INSTALLATION DU .htaccess POUR APACHE

    https://symfony.com/doc/current/setup/web_server_configuration.html#adding-rewrite-rules


    OUVRIR UN TERMINAL DANS LE DOSSIER symfony/

    ATTENTION A NE PAS AVOIR DE (ENTREE) RETOUR CHARIOT EN TROP...

    composer require symfony/apache-pack

    REPONDRE y

    => RESULTAT ON DOIT AVOIR UN FICHIER public/.htaccess

    => SI ON RAFRAICHIT LA PAGE D'ACCUEIL DANS LE NAVIGATEUR
        ON DOIT VOIR LE BANDEAU DU PROFILE EN BAS DE PAGE...


## ACTIVER GIT AVEC SYMFONY

    PRE-REQUIS: IL FAUT AVOIR GIT DEJA INSTALLE

    OUVRIR UN TERMINAL DANS LE DOSSIER symfony/

    git --version

    git init

    DANS VSCODE, FAIRE UN PREMIER COMMIT...

    SI BESOIN CONFIGURER user.name ET user.email

    git config user.name "votre nom ici"
    git config user.email "votre.email@ici"



    PAUSE DEJEUNER ET REPRISE A 14H15...

## CREER SA PREMIERE PAGE AVEC SYMFONY

    https://symfony.com/doc/current/page_creation.html


    https://symfony.com/doc/current/page_creation.html#annotation-routes


## CREER SON CONTROLLER AVEC LA CONSOLE

    OUVRIR UN TERMINAL DANS LE DOSSIER symfony/

    php bin/console make:controller

    ET DONNER LE NOM DE LA CLASSE (SANS LE SUFFIXE Controller)

    Choose a name for your controller class (e.g. GentleElephantController):
    > First

    created: src/Controller/FirstController.php
    created: templates/first/index.html.twig

    => ON OBTIENT 2 NOUVEAUX FICHIERS...

    PAUSE ET REPRISE A 16H...









