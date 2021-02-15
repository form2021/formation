# formation dev fullstack

    https://github.com/form2021/formation

## liveshare

    lundi 15/02

https://prod.liveshare.vsengsaas.visualstudio.com/join?B41D3B9E942814ABD44E222C1CE311B08097

## questions ??

## GESTION DES UTILISATEURS ET SECURITE DANS SYMFONY

    https://symfony.com/doc/current/security.html

    https://symfony.com/doc/current/security.html#a-create-your-user-class

    LANCER DANS LE TERMINAL (DANS LE DOSSIER symfony/)

    php bin/console make:user

    ON A UNE BASE DE CODE POUR L'ENTITE User
    MAIS IL MANQUE DES PROPRIETES

    email           string(255)      VARCHAR(255)
    dateCreation    datetime         DATETIME
    ...

    LANCER LA COMMANDE POUR COMPLETER LES PROPRIETES...

    php bin/console make:entity

    SE POSER DES QUESTIONS SUR LE RGPD ET LA LEGALITE DES INFOS SUR LES UTILISATEURS...

    * CONNECTER NOTRE ENTITE AVEC LE SYSTEME DE SECURITE DE SYMFONY

    https://symfony.com/doc/current/security/form_login_setup.html#generating-the-login-form


    * ON VA LANCER LA COMMANDE 

    php bin/console make:registration-form

    CA VA GENERER LE CODE...
    https://symfonycasts.com/screencast/symfony-forms/registration-form


    LE SITE A CASSE CAR IL ME MANQUE UN BUNDLE POUR L'ENVOI D'EMAIL DE CONFIRMATION

    DANS LE TERMINAL (ET DANS LE DOSSIER syfmony/)

    composer require symfonycasts/verify-email-bundle

    SI ON ESSAIE D'ALLER SUR LA PAGE /register POUR CREER UN COMPTE
    ON A UNE ERREUR SUR LA CONFIG MAILER_DSN

    https://symfony.com/doc/current/mailer.html


    PAUSE ET REPRISE A 11H25...

    LA PAGE /register S'AFFICHE MAIS ON N'A PAS LA TABLE SQL

    php bin/console make:migration

    php bin/console doctrine:migrations:migrate

    AJOUTER LE CHAMP email DANS LE FORMULAIRE

    AJOUTER LA DATE PAR DEFAUT POUR LA PROPRIETE dateCreation

    => ON A UN FORMULAIRE DE CREATION QUI FONCTIONNE

    ENSUITE VERIFIER LA PAGE /login

    => IL FAUT COMPLETER LE CODE PHP POUR REDIRIGER VERS LA BONNE PAGE

   PAUSE DEJEUNER ET REPRISE A 14H...

## PROTECTION DE LA PARTIE ADMIN

    RAJOUTER UNE LIGNE DANS LE FICHIER 
    config/packages/security.yaml

```yaml

    # Easy way to control access for large sections of your site
    # Note: Only the *first* access control that matches will be used
    access_control:
        - { path: ^/admin, roles: ROLE_ADMIN }
        # - { path: ^/admin, roles: ROLE_ADMIN }
        # - { path: ^/profile, roles: ROLE_USER }

```


## PROTEGER LES FORMULAIRES EN AJOUTANT DES CONTRAINTES

    * LISTE DES CONTRAINTES DISPONIBLES
    https://symfony.com/doc/current/reference/constraints.html

    * LIGNE UNIQUE
    https://symfony.com/doc/current/reference/constraints/UniqueEntity.html

    * PROPRIETE EMAIL
    https://symfony.com/doc/current/reference/constraints/Email.html

    ON PEUT AJOUTER DES CONTRAINTES SUR LES ENTITES AVEC DES ANNOTATIONS
    MAIS AUSSI DANS LES FORMULAIRES AVEC DU CODE PHP

```php
// ...
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

// ...
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"username"}, message="There is already an account with this username")
 * @UniqueEntity(fields={"email"}, message="il y a déjà un compte avec cet email")
 */
class User implements UserInterface
{
    // ...
    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email(
     *     message = "désolé '{{ value }}' n'est pas un email valide."
     * )
     */
    private $email;

    // ...

}

```


## PERSONNALISER LES FORMULAIRES AVEC TWIG

    * PLUSIEURS NIVEAUX DE DETAILS SONT DISPONIBLES 
        POUR PRENDRE LA MAIN SUR LE CODE HTML DES FORMULAIRES

    https://symfony.com/doc/current/form/form_customization.html


    PAUSE ET REPRISE A 15H50



## PROJET POUR LA SEMAINE


    SITE DE PETITES ANNONCES

    UN VISITEUR PEUT CREER UN COMPTE
    ENSUITE IL PEUT SE CONNECTER
    ET UNE FOIS CONNECTE, IL A ACCES A UN ESPACE MEMBRE
    DANS SON ESPACE MEMBRE, 
        IL PEUT CREER DES ANNONCES
        IL NE PEUT VOIR QUE SES ANNONCES
        IL NE PEUT MODIFIER QUE SES ANNONCES
        IL NE PEUT SUPPRIMER QUE SES ANNONCES

        RELATION ONE TO MANY ENTRE User ET Annonce
        (UNE ANNONCE EST CREEE PAR UN USER)
        (UN USER PEUT CREER PLUSIEURS ANNONCES)

        RELATION MANY TO MANY ENTRE Annonce ET Categorie
        UNE ANNONCE PEUT ETRE CLASSEE DANS PLUSIEURS CATEGORIES
        UNE CATEGORIE PEUT CONTENIR PLUSIEURS ANNONCES

    SUR LA PARTIE PUBLIQUE
        AJOUTER UNE PAGE QUI AFFICHE TOUTES LES ANNONCES
        ET CHAQUE ANNONCE A SA PROPRE PAGE

        AJOUTER UN MOTEUR DE RECHERCHE 
            POUR CHERCHER LES ANNONCES QUI CONTIENNENT UN MOT CLE

    DANS LA PARTIE ADMIN    (make:crud et compléter...)
        AJOUTER LA GESTION 
        DE TOUS LES USERS
        DE TOUS LES ANNONCES
        DE TOUTES LES CATEGORIES
        ...

    CREER LES ENTITES ET LE CRUD 
    (make:entity ET make:crud)

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