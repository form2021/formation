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
    








