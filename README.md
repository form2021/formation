# formation dev fullstack

    https://github.com/form2021/formation

## liveshare

    jeudi 11/02

https://prod.liveshare.vsengsaas.visualstudio.com/join?1C8C4471E6B72B3ED303526D4EE12A4B64D9

## questions ??

## bases de symfony: créer un site de quelques pages

    Accueil         /
    Galerie         /galerie
    Contact         /contact

    ouvrir un terminal dans le dossier symfony/
    php bin/console make:controller

    Choose a name for your controller class (e.g. BravePizzaController):
    > Site

    created: src/Controller/SiteController.php
    created: templates/site/index.html.twig


    Success!


    ENSUITE, ON CREE LES ROUTES POUR CHAQUE PAGE...
    ET AUSSI LES TEMPLATES TWIG POUR CHAQUE PAGE...

```php
<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SiteController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('site/index.html.twig', [
            'controller_name' => 'SiteController',
        ]);
    }

    #[Route('/galerie', name: 'galerie')]
    public function galerie(): Response
    {
        return $this->render('site/galerie.html.twig', [
            'controller_name' => 'SiteController',
        ]);
    }

    #[Route('/contact', name: 'contact')]
    public function contact(): Response
    {
        return $this->render('site/contact.html.twig', [
            'controller_name' => 'SiteController',
        ]);
    }

}

```

### CREER DES LIENS VERS LES ROUTES DANS TWIG


    https://symfony.com/doc/current/templates.html#linking-to-pages

    https://symfony.com/doc/current/reference/twig_reference.html#path

```twig

        <nav>
            <a href="{{ path('index') }}">accueil</a>
            <a href="{{ path('galerie') }}">galerie</a>
            <a href="{{ path('contact') }}">contact</a>
        </nav>

```

## CREER DES URLS POUR LES FICHIERS CSS, JS, IMAGES, etc...

    https://symfony.com/doc/current/templates.html#linking-to-css-javascript-and-image-assets

```twig
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Projet Symfony</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <nav>
            <a href="{{ path('index') }}">accueil</a>
            <a href="{{ path('galerie') }}">galerie</a>
            <a href="{{ path('contact') }}">contact</a>
        </nav>
    </header>
    <main>
        <section>
            <h1>MON TITRE1</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, numquam in, mollitia culpa quia nostrum eius amet modi ipsam minus inventore assumenda eum ipsum voluptates, totam quibusdam similique consequatur expedita?</p>
            <img src="{{ asset('images/photo1.jpg') }}" alt="photo1">
        </section>
    </main>
    <footer>
        <p>tous droits réservés</p>
    </footer>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>

```


    PAUSE ET REPRISE A 11H15...


## EXO EN AUTONOMIE (60 MINUTES)

    AJOUTER DES BLOCS DANS LE TEMPLATE PARENT
    ET REMPLIR LES BLOCS DANS LES TEMPLATES ENFANTS

    OBJECTIF: ARRIVER A CONSTRUIRE UN SITE AVEC DU CONTENU DIFFERENT SUR LES 3 PAGES...

    NE PAS HESITER A POSER DES QUESTIONS...

## BASE DE DONNEES ET SYMFONY

    https://symfony.com/doc/current/doctrine.html

    https://www.doctrine-project.org/

    * VIDEOS TUTOS (CERTAINES PAYANTES...)
    https://symfonycasts.com/screencast/symfony-doctrine

    SYMFONY UTILISE LE CODE DU PROJET DOCTRINE POUR GERER LA PARTIE AVEC LA DATABASE...


    AJOUTER LA LIGNE DE CONFIG DANS LE FICHIER .env

```
###> doctrine/doctrine-bundle ###
# Format described at https://www.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/configuration.html#connecting-using-a-url
# IMPORTANT: You MUST configure your server version, either here or in config/packages/doctrine.yaml
#
# DATABASE_URL="sqlite:///%kernel.project_dir%/var/data.db"
# DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7"
# DATABASE_URL="postgresql://db_user:db_password@127.0.0.1:5432/db_name?serverVersion=13&charset=utf8"
# AVEC VOTRE SERVEUR LARAGON
# DATABASE_URL="mysql://root:@localhost:3306/symfony?serverVersion=5.7"
# DANS MON CAS 
DATABASE_URL="mysql://root:@localhost:3306/symfony?serverVersion=mariadb-10.4.17"
###< doctrine/doctrine-bundle ###

```
    ET ENSUITE DANS LE TERMINAL LANCER LA COMMANDE

    php bin/console doctrine:database:create

    ET SI TOUT SE PASSE BIEN, ON PEUT VERIFIER AVEC PHPMYADMIN QUE LA DATABASE EST CREEE...

    Created database `symfony` for connection named default


    PAUSE ET REPRISE A 14H...


## AJOUTER UNE TABLE SQL POUR ENREGISTRER LES INSCRIPTIONS A UNE NEWSLETTER

    Table SQL newsletter
        id                  INT             INDEX=PRIMARY   A_I
        nom                 VARCHAR(255)
        email               VARCHAR(255)
        date_inscription    DATETIME


    https://symfony.com/doc/current/doctrine.html#creating-an-entity-class

    DANS SYMFONY, ON PASSE PAR UNE LIGNE DE COMMANDE QUI VA CREER UNE CLASSE PHP
    ET ENSUITE, D'AUTRES LIGNES DE COMMANDES VONT CREER LA TABLE SQL...

    ON AURA UNE CLASSE Newsletter
    => ON APPELLE ENTITE/ENTITY UNE CLASSE QUI EST RELIEE A UNE TABLE SQL 
        (PERSISTENCE...)

    ET DANS NOTRE CLASSE, ON AURA DES PROPRIETES 
    => CES PROPRIETES VONT DEVENIR DES COLONNES DANS NOTRE TABLE SQL
        (ORM Object Relationship Mapping)

    EN PHP, ON A                EN SQL, ON A
    UNE CLASSE Newsletter       UNE TABLE newsletter
    UNE PROPRIETE               UNE COLONNE
        id                          id
        nom                         nom
        email                       email
        dateInscription             date_inscription


    php bin/console make:entity

    => ASSISTANT POUR CREER LA CLASSE ET LES PROPRIETES

    ENSUITE QUAND ON EST BON SUR LA CLASSE ENTITE Newsletter.php
    ON PEUT LANCER LA COMMANDE SUIVANTE...

    php bin/console make:migration

    => CREE UN FICHIER DANS LE DOSSIER migrations
    => IL Y A LE CODE SQL QUI PERMET DE CREER LA TABLE SQL

    ENSUITE, IL FAUT LANCER LA COMMANDE POUR EXECUTER LA REQUETE SQL

    php bin/console doctrine:migrations:migrate

## GENERER UN CRUD A PARTIR D'UNE ENTITE

    NOUVELLE VERSION DEPUIS 2018
    https://symfony.com/blog/new-and-improved-generators-for-makerbundle#added-a-new-make-crud-generator

    ON A UNE LIGNE DE COMMANDE QUI PERMET DE GENERER LE CODE POUR UN CRUD A PARTIR D'UNE ENTITE

    php bin/console make:crud

    The class name of the entity to create CRUD (e.g. BravePopsicle):
    > Newsletter
    Newsletter

    created: src/Controller/NewsletterController.php
    created: src/Form/NewsletterType.php
    created: templates/newsletter/_delete_form.html.twig
    created: templates/newsletter/_form.html.twig
    created: templates/newsletter/edit.html.twig 
    created: templates/newsletter/index.html.twig
    created: templates/newsletter/new.html.twig       
    created: templates/newsletter/show.html.twig      

            
    Success! 
            

    Next: Check your new CRUD by going to /newsletter/


    PAUSE ET REPRISE A 15H45...


    Create      => FORMULAIRE POUR AJOUTER UNE NOUVELLE LIGNE
    Read        => AFFICHAGE LISTE ET AFFICHAGE UNE SEULE LIGNE
    Update      => FORMULAIRE POUR MODIFIER UNE LIGNE EXISTANTE
    Delete      => FORMULAIRE POUR SUPPRIMER UNE LIGNE EXISTANTE


```php
// ON AJOUTERA LE PREFIXE /admin A TOUTES LES ROUTES OBTENUES AVEC LE make:crud
// => ON PREPARE LA PROTECTION POUR AUTORISER L'ACCES SEULEMENT LES ADMINISTRATEURS

#[Route('/admin/newsletter')]                                                        // PREFIXE COMMUN POUR LES URLS DANS LA CLASSE
class NewsletterController extends AbstractController
{
    #[Route('/', name: 'newsletter_index', methods: ['GET'])]                       // URL DANS LE NAVIAGATEUR /admin/newsletter/
    public function index(NewsletterRepository $newsletterRepository): Response
    {
    }

    #[Route('/new', name: 'newsletter_new', methods: ['GET', 'POST'])]              // URL DANS LE NAVIGATEUR /admin/newsletter/new
    public function new(Request $request): Response
    {
    }

}
```


    LES METHODES CONTROLLER SONT RELIEES A DES TEMPLATES TWIG
    QUI HERITENT DE base.html.twig

    => ATTENTION AU CODE DANS base.html.twig
        IL FAUT GARDER LES BLOCS title ET body


## ACTIVATION DU MODE BOOTSTRAP POUR LA PARTIE ADMIN

    https://symfony.com/doc/current/form/bootstrap4.html

    MODIFIER LE FICHIER config/packages/twig.yaml

```yaml

twig:
    default_path: '%kernel.project_dir%/templates'
    form_themes: ['bootstrap_4_layout.html.twig']

```

    ET ENSUITE COMPLETER base.html.twig POUR CHARGER LE CODE DE BOOTSTRAP

    https://getbootstrap.com/docs/4.6/getting-started/introduction/


```twig
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>{% block title %}Welcome!{% endblock %}</title>
        {# Run `composer require symfony/webpack-encore-bundle`
           and uncomment the following Encore helpers to start using Symfony UX #}

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
   
        {% block stylesheets %}
            {#{{ encore_entry_link_tags('app') }}#}
        {% endblock %}
        
    </head>
    <body>
        <div class="container">
            {% block body %}{% endblock %}
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

        {% block javascripts %}
            {#{{ encore_entry_script_tags('app') }}#}
        {% endblock %}
    </body>
</html>

```

## LIER SON DOSSIER GIT AVEC UN REPO SUR GITHUB.COM

    IL FAUT UN COMPTE GITHUB.COM
    ET ENSUITE CREER UN REPO VIDE SUR GITHUB.COM

    ENFIN ON VA CONNECTER NOTRE DOSSIER GIT AVEC LE REPO GITHUB.COM

    ET DANS VSCODE, ON PEUT AJOUTER LES LIGNES DE COMMANDE 
    POUR LIER NOTRE DOSSIER AVEC LE REPOSITORY GITHUB.COM

    git remote add origin https://github.com/form2021/symfony.git
    git branch -M main
    git push -u origin main













































