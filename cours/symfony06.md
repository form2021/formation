# formation dev fullstack

    https://github.com/form2021/formation

## liveshare

    mercredi 17/02

https://prod.liveshare.vsengsaas.visualstudio.com/join?A1E824835DCCE2F189DA2203BAAE3EC0151E

## questions ??

## recap avec Symfony


### INSTALLATION DE SYMFONY

    * si on travaille en équipe
    * une personne dans l'équipe qui fait l'installation le dossier symfony

            composer create-project symfony/website-skeleton symfony

    * cette personne complète l'installation

        pour garder un historique, on ajoute git (et ensuite faire des commits...)
        
            git init

        comme on utilise apache, il nous faut public/.htaccess

            composer require symfony/apache-pack

        pour préparer la database
        AJOUTER LA LIGNE DE CONFIG DANS LE FICHIER .env (à adapter à votre projet...)

        DATABASE_URL="mysql://root:@localhost:3306/symfony?serverVersion=5.7"

        dans le terminal, pour créer la database (vide...)
        php bin/console doctrine:database:create

        * github.com
            créer un repository (vide) sur github.com
            inviter les autres membres de l'équipe 
            (et les autres membres doivent accepter...)

            connecter votre dossier avec un repository github.com

            exemple:
                git remote add origin https://github.com/form2021/symfony.git (à personnaliser...)
                git branch -M main
                git push -u origin main

            => ENSUITE LES AUTRES MEMBRES DE L'EQUIPE PEUVENT FAIRE UN CLONE

                LES AUTRES SUR LEUR ORDINATEUR

                git clone https://github.com/form2021/symfony.git (à personnaliser...)

                ET IL FAUT COMPLETER L'INSTALLATION AVEC

                composer install

                php bin/console doctrine:database:create

        ICI, DANS CES ETAPES, CHACUN A UNE INSTALLATION D'UN SYMFONY SUR SON ORDINATEUR
        ET SON DOSSIER EST CONNECTE AU REPOSITORY GITHUB.COM POUR SYNCHRONISER LE CODE.
        => VOUS POUVEZ COMMENCER A TRAVAILLER EN EQUIPE

### PAGES PUBLIQUES

        * débuter avec quelques pages (facile...)
        * créer les pages sur la partie publique

        php bin/console make:controller SiteController (à personnaliser...)

### LES ENTITES ET LE CRUD

#### LES User ET LA SECURITE

        ET APRES INSTALLER TOUTE LA PARTIE User ET SECURITE

        php bin/console make:user
        ...
        php bin/console make:auth
        ...
        php bin/console make:registration-form


        php bin/console make:migration
        php bin/console doctrine:migrations:migrate

        protéger la partie admin, dans le fichier config/packages/security.yaml

        # Easy way to control access for large sections of your site
        # Note: Only the *first* access control that matches will be used
        access_control:
            - { path: ^/admin, roles: ROLE_ADMIN }
            - { path: ^/membre, roles: ROLE_USER }

#### LES ENTITES POUR VOTRE PROJET

        Et ensuite créer les entités...
        php bin/console make:entity

        php bin/console make:migration
        php bin/console doctrine:migrations:migrate

        php bin/console make:crud

        => ajouter le préfixe /admin/ sur les routes (dans le fichier ...Controller.php)
        => active la protection des pages CRUD...

### AJOUTER LES PAGES SUPPLEMENTAIRES ET COMPLETER LE CODE SUR CHAQUE PAGE


    S'INSPIRER DU CODE GENERE PAR LE make:crud
    POUR CREER VOTRE CODE POUR LES AUTRES PAGES DE VOTRE PROJET...



## DEMARRER UN PROJET

    PERSONA
    * VISITEURS
        CHAQUE PERSONA A UNE PROBLEMATIQUE
        ET VOTRE PROJET LUI APPORTE UNE SOLUTION

        exemple: 
        je m'appelle jean et j'habite à telle adresse
        et j'aurais besoin de résoudre tel problème
        sur internet, je vais trouver un site qui va m'aider à résoudre ce problème
        (=> ce site c'est votre projet...)

        => à partir de ce persona, on peut créer un scénario d'utilisation (Use Case...)


        exemple:
        problème:
            jean veut vendre un scooter dont il ne sert plus
        solution apportée par le site:
            jean peut publier une annonce sur le site
        comment ça se passe:
            jean arrive la page d'accueil et voit telle information et va faire telle action...
            jean clique sur le bouton pour aller sur la page de création de compte
            jean remplit le formulaire de création ce compte
            jean peut se connecter avec la page de login
            jean arrive sur la page d'espace membre
            jean peut créer une annonce
            jean peut voir son annonce sur la page des annonces

        => donne les pages à créer et les actions à gérer sur chaque page pour réaliser le scénario
        => permet de tester si tout marche correctement

    PERSONA CLIENT
    * IMAGINER LE PROFIL DU CLIENT POUR LEQUEL VOUS DEVELOPPEZ LE PROJET
    => DONNE LE TYPE DE PARTIE ADMIN A CREER POUR CE CLIENT


## PERFORMANCES PHP ET FRAMEWORKS ET CMS

    https://kinsta.com/fr/blog/comparaison-php/

## CREER UNE PAGE POUR CHAQUE ANNONCE


    AJOUTER UNE ROUTE AVEC PARAMETRES

```php
    #[Route('/annonce/{slug}/{id}', name: 'annonce', methods: ['GET'])]
    public function annonce(Annonce $annonce): Response
    {
        // méthode pour afficher une seule annonce
        return $this->render('site/annonce.html.twig', [
            'annonce' => $annonce,
        ]);
    }


```

    ET CREER LES LIENS VERS CES PAGES

```twig

<h3><a href="{{ path('annonce', {'slug': annonce.slug, 'id': annonce.id}) }}">{{ annonce.titre }}</a></h3>

```

## FETCH EAGER

    POUR AFFICHER L'AUTEUR DE L'ANNONCE, ON VA OPTIMISER LA REQUETE POUR FAIRE UNE JOINTURE
    => AJOUTER UNE ANNOTATION fetch="EAGER"

```php

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="annonces", fetch="EAGER")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

```

    PAUSE ET REPRISE A 11H15...

## EXO: AFFICHER LES ANNONCES DU USER CONNECTE DANS L'ESPACE MEMBRE

    EN PLUS DU FORMULAIRE POUR PUBLIER UNE ANNONCE,
    ON VEUT AFFICHER DANS UNE AUTRE SECTION, LA LISTE DES ANNONCES DE L'UTILISATEUR CONNECTE...

    CHECKPOINT A 11H45...


## UPLOAD DE FICHIERS DANS UN FORMULAIRE

    * TUTO SYMFONY
    https://symfony.com/doc/current/controller/upload_file.html


    PAUSE DEJEUNER ET REPRISE 14H05...

## AJOUT CRUD ESPACE MEMBRE ET UPLOAD

    ON FAIT UN CRUD PLUS COMPACT
    * CREATE ET READ SUR LA MEME PAGE
    * EDIT SUR UNE PAGE SEPAREE
    => CA DONNE MOINS DE FICHIERS ;-p


```php
<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
// ne pas oublier les use
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Annonce;
use App\Form\AnnonceType;
use App\Repository\AnnonceRepository;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class MembreController extends AbstractController
{
    #[Route('/membre', name: 'membre', methods: ['GET', 'POST'])]
    public function index(Request $request, AnnonceRepository $annonceRepository, SluggerInterface $slugger): Response
    {
        $annonce = new Annonce();
        $form = $this->createForm(AnnonceType::class, $annonce);
        $form->handleRequest($request);

        $userConnecte = $this->getUser();
        $messageConfirmation = "";
        if ($form->isSubmitted() && $form->isValid()) {
            // compléter les infos manquantes
            $annonce->setDatePublication(new \DateTime());
            // https://symfony.com/doc/current/security.html#a-fetching-the-user-object
            // ajouter l'auteur de l'annonce avec l'utilisateur connecté
            $annonce->setUser($userConnecte);
            
            // code de gestion de upload image
            $imageFile = $form->get('image')->getData();

            // this condition is needed because the 'image' field is not required
            // so the PDF file must be processed only when a file is uploaded
            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$imageFile->guessExtension();

                // Move the file to the directory where images are stored
                try {
                    $imageFile->move(
                        $this->getParameter('images_directory'),    // dossier cible
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'imageFilename' property to store the PDF file name
                // instead of its contents
                $annonce->setImage($newFilename);
            }
            else {
                $annonce->setImage("");     // aucun fichier uploade
            }

            // code qui insère la nouvelle ligne dans SQL
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($annonce);
            $entityManager->flush();

            $messageConfirmation = "votre annonce est publiée";
        }

        // après le traitement du create pour obtenir la liste à jour
        $annonces = $annonceRepository->findBy([
            "user" => $userConnecte,            
            // on filtre les lignes pour obtenir seulement les annonces de l'utilisateur
        ], [ "datePublication" => "DESC"]);

        return $this->render('membre/index.html.twig', [
            'annonces' => $annonces,    // LISTE DES ANNONCES
            'annonce' => $annonce,
            'form' => $form->createView(),
            'messageConfirmation' => $messageConfirmation,
        ]);
    }

    #[Route('/membre/{id}', name: 'membre_annonce_delete', methods: ['DELETE'])]
    public function delete(Request $request, Annonce $annonce): Response
    {
        if ($this->isCsrfTokenValid('delete'.$annonce->getId(), $request->request->get('_token'))) {
            // verifier que l'annonce appartient à l'utilisateur connecté
            $userConnecte = $this->getUser();
            $auteurAnnonce = $annonce->getUser();
            if ($userConnecte != null && $auteurAnnonce != null) {
                if ($userConnecte->getId() == $auteurAnnonce->getId()) {
                    // declenche le delete de la ligne
                    $entityManager = $this->getDoctrine()->getManager();
                    $entityManager->remove($annonce);
                    $entityManager->flush();

                    // il faudrait aussi supprimer le fichier image
                    // https://www.php.net/manual/fr/function.unlink.php
                    $dossierUpload = $this->getParameter('images_directory');
        
                    $fichierImage = "$dossierUpload/" . $annonce->getImage();
                    if (is_file($fichierImage)) {
                        unlink($fichierImage);
                    }
                }
            }
        }

        return $this->redirectToRoute('membre');
    }

    #[Route('membre/{id}/edit', name: 'membre_annonce_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Annonce $annonce, SluggerInterface $slugger): Response
    {
        $userConnecte = $this->getUser();
        $auteurAnnonce = $annonce->getUser();
        if ($userConnecte == null || $auteurAnnonce == null) {
            // erreur renvoyer vers l'espace membre
            return $this->redirectToRoute('membre');
        }
        else if ($userConnecte->getId() != $auteurAnnonce->getId()) {
            // erreur renvoyer vers l'espace membre
            return $this->redirectToRoute('membre');
        }

        // ok les auteurs correspondent et on peut continuer
        $form = $this->createForm(AnnonceType::class, $annonce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // code de gestion de upload image
            $imageFile = $form->get('image')->getData();

            // this condition is needed because the 'image' field is not required
            // so the PDF file must be processed only when a file is uploaded
            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename  = $safeFilename.'-'.uniqid().'.'.$imageFile->guessExtension();

                // Move the file to the directory where images are stored
                try {
                    $imageFile->move(
                        $this->getParameter('images_directory'),    // dossier cible
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // supprimer l'image d'avant
                $dossierUpload = $this->getParameter('images_directory');
                $fichierImage = "$dossierUpload/" . $annonce->getImage();
                if (is_file($fichierImage)) {
                    unlink($fichierImage);
                }

                // updates the 'imageFilename' property to store the PDF file name
                // instead of its contents
                $annonce->setImage($newFilename);
            }
            else {
                // on laisse l'image d'avant => on ne fait rien
            }

            // la mise est à jour est déclenchée automatiquement 
            // car Symfony sait déjà que l'objet $annonce est associée à une ligne SQL
            $this->getDoctrine()->getManager()->flush();

        }

        return $this->render('membre/edit.html.twig', [
            'annonce' => $annonce,
            'form' => $form->createView(),
        ]);
    }

}


```


```twig
{% extends 'base.html.twig' %}

{% block title %}Espace Membre{% endblock %}

{% block body %}
    <h1>espace membre</h1>
    <h2>Bienvenue {{ app.user.username }}</h2>

    <section>
        <h3>publier une annonce</h3>
        {{ form_start(form) }}
            {{ form_widget(form) }}
            <button class="btn btn-primary">{{ button_label|default('Publier votre annonce') }}</button>
            <div>{{ messageConfirmation }}</div>
        {{ form_end(form) }}
    </section>

    <section class="container">
        <div class="annonces row">
            {% for annonce in annonces %}
                <article class="col-sm-4 mb-3">
                    <h3><a href="{{ path('annonce', {'slug': annonce.slug, 'id': annonce.id}) }}">{{ annonce.titre }}</a></h3>
                    <div>publié par {{ annonce.user.username }}</div>
                    <p>{{ annonce.contenu }}</p>
                    {% if annonce.image %}
                        <div><img src="{{ asset('uploads/' ~ annonce.image) }}" class="img-fluid"></div>
                    {% else %}
                        <div>(pas d'image)</div>
                    {% endif %}
                    <div>{{ annonce.datePublication ? annonce.datePublication|date('d/m/Y à H:i') : '' }}</div>
                    <div>
                        <a class="btn btn-success" href="{{ path('membre_annonce_edit', {'id': annonce.id}) }}">Modifier</a>
                    </div>
                    <div>
                        <form method="post" action="{{ path('membre_annonce_delete', {'id': annonce.id}) }}" onsubmit="return confirm('Are you sure you want to delete this item?');">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token('delete' ~ annonce.id) }}">
                            <button class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </article>
            {% else %}
                <article>
                    <div>aucune annonce n'est publiée</div>
                </article>
            {% endfor %}

        </div>
    </section>

{% endblock %}


```


```twig
{% extends 'base.html.twig' %}

{% block title %}Modifier Annonce Membre{% endblock %}

{% block body %}
    <h1>Modifier Annonce Membre</h1>

    {{ form_start(form) }}
        {{ form_widget(form) }}
        <button class="btn btn-primary">{{ button_label|default('Modifier votre annonce') }}</button>
    {{ form_end(form) }}

{% endblock %}

```

    PAUSE ET REPRISE A 15H45

    AUTONOMIE POUR LE RESTE DE LA JOURNEE...

    





