# formation dev fullstack

    https://github.com/form2021/formation

## liveshare

    mardi 16/02

https://prod.liveshare.vsengsaas.visualstudio.com/join?1385DE286D62F362A671381C52D65BAED945

## questions ??

## ENTITE Categorie

    id
    label
    description
    
## ENTITE Annonce

    id
    titre
    slug
    contenu
    image
    datePublication

    UNE FOIS LE make:crud FAIT
    ON PEUT CREER DES ANNONCES DANS LA PARTIE /admin/annonce

    * AJOUTER DANS LA PARTIE PUBLIQUE UNE PAGE /annonces
        QUI VA AFFICHER LES ANNONCES POUR LES VISITEURS 

    RAJOUTER LES RELATIONS DANS UN 2E TEMPS
    user_id     => ONE TO MANY (relation avec User)

    NE PAS HESITER A POSER DES QUESTIONS...


    PAUSE ET REPRISE A 11H15...


## AJOUT DE RELATIONS ENTRE ENTITES

    * DOCUMENTATION UN PEU PLUS DETAILLEE SUR LES ETAPES AVEC make:entity
    https://symfony.com/doc/current/doctrine/associations.html

    LANCER LA COMMANDE make:entity
    ET CREER UNE PROPRIETE
    ET CHOISIR COMME TYPE relation
    REPONDRE AUX QUESTIONS...

## TWIG POUR AFFICHER UN MENU DIFFERENT SI LE VISITEUR EST CONNECTE

    * OBTENIR LES INFOS SUR LE USER CONNECTE
    https://symfony.com/doc/current/security.html#fetch-the-user-in-a-template

    * OBTENIR LES DROITS SUR LE USER CONNECTE
    https://symfony.com/doc/current/security.html#fetch-the-user-in-a-template

    DANS TWIG SYMFONY CREE UNE VARIABLE app 
    QU'ON PEUT UTILISER POUR RETROUVER L'UTILISATEUR CONNECTE

```twig

        {% if app.user %}
            <div class="mb-3">
                Bienvenue {{ app.user.username }}, <a href="{{ path('app_logout') }}">Déconnexion</a>
            </div>
        {% else %}
            <nav>
                <a href="{{ path('app_register') }}">créez votre compte</a>
                <a href="{{ path('app_login') }}">connexion</a>
            </nav>
        {% endif %}


```

    PAUSE ET REPRISE A 14H05...


## OBTENIR LE USER CONNECTE DANS PHP

    * DANS UNE CLASSE ...Controller, ON A LE METHODE  $this->getUser();
        => SIMPLE

    https://symfony.com/doc/current/security.html#a-fetching-the-user-object

    * SI ON N'EST PAS DANS UNE CLASSE ...Controller
        => PLUS COMPLIQUE CAR ON DOIT PASSER PAR INJECTION DE DEPENDANCES

    https://symfony.com/doc/current/security.html#b-fetching-the-user-from-a-service


```php
// src/Service/ExampleService.php
// ...

use Symfony\Component\Security\Core\Security;

class ExampleService
{
    private $security;

    public function __construct(Security $security)
    {
        // Avoid calling getUser() in the constructor: auth may not
        // be complete yet. Instead, store the entire Security object.
        $this->security = $security;
    }

    public function someMethod()
    {
        // returns User object or null if not authenticated
        $user = $this->security->getUser();
    }
}

```


## TESTS AUTOMATISES AVEC PHPUNIT

    * A DECOUVRIR: COMMENT CREER DES TESTS AUTOMATISES DANS SYMFONY AVEC PHPUNIT
    https://symfony.com/doc/current/testing.html#your-first-functional-test


## PROTEGER ESPACE MEMBRE

    AJOUTER UNE REGLE DANS LE FICHIER config/packages/security.yaml
    ET AUSSI METTRE A JOUR LA REDIRECTION DANS src/Security/LoginFormAuthenticator.php


```yaml
    # Easy way to control access for large sections of your site
    # Note: Only the *first* access control that matches will be used
    access_control:
        - { path: ^/admin, roles: ROLE_ADMIN }
        - { path: ^/membre, roles: ROLE_USER }


```


```php

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $providerKey)
    {
        if ($targetPath = $this->getTargetPath($request->getSession(), $providerKey)) {
            return new RedirectResponse($targetPath);
        }

        // IL FAUT RECUPERER L'UTILISATEUR CONNECTE
        // ET SUIVANT LE ROLE DE L'UTILISATEUR, ON LE REDIRIGE VERS L'ESPACE ADMIN OU MEMBRE
        // https://symfony.com/doc/current/security.html#b-fetching-the-user-from-a-service
        // https://symfony.com/doc/current/security.html#hierarchical-roles
        // $userConnecte = $this->security->getUser();
        // BAD
        // $isAdmin = in_array("ROLE_ADMIN", $userConnecte->getRoles());

        // GOOD
        $nomRouteRedirection = "index";
        if ($this->security->isGranted("ROLE_ADMIN")) {
            // redirection vers la page /admin
            $nomRouteRedirection = "admin";
        }
        elseif ($this->security->isGranted("ROLE_USER")) {
            // redirection vers la page /membre
            $nomRouteRedirection = "membre";
        }

        // For example : 
        // TODO: CHANGER LA REDIRECTION VERS UNE PAGE ESPACE MEMBRE
        // POUR LE MOMENT, ON REDIRIGE VERS LA PAGE D'ACCUEIL...
        return new RedirectResponse($this->urlGenerator->generate($nomRouteRedirection));
        // throw new \Exception('TODO: provide a valid redirect inside '.__FILE__);
    }


```

## AJOUTER UN FORMULAIRE POUR CREER UNE ANNONCE


    DANS LA PAGE D'ESPACE MEMBRE
    AJOUTER UN FORMULAIRE POUR PERMETTRE A UN MEMBRE DE PUBLIER UNE ANNONCE

    BONUS:
    CREER LA PAGE /annonces DANS LA PARTIE PUBLIQUE POUR LES VISITEURS
    ET AFFICHER LA LISTE DES ANNONCES DANS CETTE PAGE

    AUTONOMIE JUSQU'A 15H30...
    PAUSE DE 15H30 A 15H45
    ET REPRISE A 15H45...

