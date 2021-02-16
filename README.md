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