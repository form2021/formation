# formation dev fullstack

    https://github.com/form2021/formation

## liveshare

    vendredi après-midi 12/02

https://prod.liveshare.vsengsaas.visualstudio.com/join?D42586EABC60C2FDD1EA8B7AD80D5ACF5F91


## questions ??

## github.com pour le travail en équipe

    une personne dans l'équipe qui 
    * créé le repository sur github.com
    * crée le symfony pour le projet sur son ordinateur
    * connecte son dossier symfony à le repository sur github.com

    * ensuite inviter les autres membres de l'équipe
        => les autres membres doivent accepter l'invitation
        => le repository devient commun à toute l'équipe

    * les autres membres vont cloner le repository sur leur ordinateur
        => attention: le clone fournit une installation incomplète
    * et il faut compléter l'installation avec la ligne de commande
        ouvrir un terminal dans le dossier symfony du projet
        et lancer la commande 

        composer install

        et il faut aussi importer la base de données SQL
        (soit en export/import avec phpmyadmin... soit avec les commandes de symfony...)

    * ensuite, chaque dev travaille sur ses fichiers
    * chaque dev peut faire des commits (sauvegardes en local...)
    * et régulièrement, si tout marche correctement, partager votre code en faisant un push...


## CARTES EN JS

    * SIMPLE ET EFFICACE
    https://leafletjs.com/examples.html

    * PLUS COMPLET MAIS PLUS COMPLEXE
    https://developers.google.com/maps/documentation/javascript/examples/marker-simple

## GIT EN LIGNE DE COMMANDE

    * pour commit

    git add -A
    git commit -a -m "message pour la modif"

    * pour envoyer sur github.com

    git push

    * pour récupérer sur github.com

    git pull


    PAUSE ET REPRISE A 11H15...

## EXO: PREPARER UNE TABLE SQL POUR LE FORMULAIRE DE CONTACT

    OBJECTIF:
    (DANS LE MEME PROJET SYMFONY, ET LA MEME DATABASE...)
    UTILISER TOUTE LA MECANIQUE SYMFONY (make:entity, make:crud, etc...)

    AJOUTER LA TABLE SQL contact
        id
        email
        nom
        prenom
        objet
        message
        date_message

    N'HESITEZ PAS A POSER DES QUESTIONS...

    PAUSE DEJEUNER ET REPRISE A 14H...

## REPRENDRE LE CODE CREATE DU CRUD POUR COPIER LE FORMULAIRE DANS LA PAGE PUBLIQUE


    FORMULAIRE DE NEWSLETTER
    FORMULAIRE DE CONTACT

    changer le code PHP
    changer le code twig

```php
<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
// ne pas oublier de rajouter les lignes use...
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Newsletter;
use App\Form\NewsletterType;

class SiteController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET', 'POST'])]
    public function index(Request $request): Response
    {
        $messageConfirmation    = 'merci de remplir le formulaire';
        $classConfirmation      = 'gris';

        $newsletter = new Newsletter(); // code créé avec le make:entity
        $form = $this->createForm(NewsletterType::class, $newsletter);
        $form->handleRequest($request);
        // bloc if pour le traitement du formulaire
        if ($form->isSubmitted() && $form->isValid()) {
            // alors on traite le formulaire

            // ici on peut compléter les infos manquantes
            $objetDate = new \DateTime();   // objet qui contient la date actuelle
            $newsletter->setDateInscription($objetDate);
    
            // on envoie les infos en base de données
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($newsletter);
            $entityManager->flush();

            // tout s'est bien passé
            $messageConfirmation    = 'merci de votre inscription';
            $classConfirmation      = 'vert';

            // pas de redirection pour la page d'accueil
            // return $this->redirectToRoute('newsletter_index');
        }

        return $this->render('site/index.html.twig', [
            'classConfirmation'     => $classConfirmation,
            'messageConfirmation'   => $messageConfirmation,    // tuyau de transmission entre PHP et twig
            'newsletter' => $newsletter,
            'form' => $form->createView(),
            'controller_name' => 'SiteController',
        ]);
    }

    // ...
}

```

```twig
{% extends 'parent.html.twig' %}

{# 
le template enfant ne fait que remplir 
des blocks definis par le parent
#}

{% block titre1 %}
<h1>Accueil PAR DEV1</h1>

{{ form_start(form) }}
    {{ form_widget(form) }}
    <button class="btn">{{ button_label|default('Save') }}</button>
    <div class="{{ classConfirmation ?? 'gris' }}">{{ messageConfirmation ?? "texte par défaut" }}</div>
{{ form_end(form) }}

{% endblock %}


```

    PAUSE ET REPRISE A 15H55

        