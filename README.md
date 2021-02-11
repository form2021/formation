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



