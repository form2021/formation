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









