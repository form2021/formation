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


## EXO EN AUTONOMIE (30 MINUTES)

    AJOUTER DES BLOCS DANS LE TEMPLATE PARENT
    ET REMPLIR LES BLOCS DANS LES TEMPLATES ENFANTS

    OBJECTIF: ARRIVER A CONSTRUIRE UN SITE AVEC DU CONTENU DIFFERENT SUR LES 3 PAGES...
    
