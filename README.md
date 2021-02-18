# formation dev fullstack

    https://github.com/form2021/formation

## liveshare

    jeudi 18/02

https://prod.liveshare.vsengsaas.visualstudio.com/join?0508276D4F4390468B9C8C653BE7C3ADB412

## questions ??

## activités pour la journée

    * Many To Many entre Annonce et Categorie
    * Page de recherche

## MANY TO MANY

    * AJOUTER LES CHECKBOX DANS LE FORMULAIRE
    https://symfony.com/doc/current/reference/forms/types/entity.html#select-tag-checkboxes-or-radio-buttons


```php
<?php

namespace App\Form;

use App\Entity\Annonce;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
// ne pas oublier d'ajouter les use
use Symfony\Component\Form\Extension\Core\Type\FileType;
// https://symfony.com/doc/current/reference/constraints/Image.html
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Categorie;


class AnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('slug')
            // https://symfony.com/doc/current/reference/forms/types/entity.html#select-tag-checkboxes-or-radio-buttons
            ->add('categories', EntityType::class, [
                // looks for choices from this entity
                'class' => Categorie::class,
            
                // uses the User.username property as the visible option string
                'choice_label' => 'label',
            
                // used to render a select box, check boxes or radios
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('contenu')
            ->add('image', FileType::class, [
                'label' => 'choisissez une photo à uploader',

                // unmapped means that this field is not associated to any entity property
                'mapped' => false,

                // make it optional so you don't have to re-upload the PDF file
                // every time you edit the Product details
                'required' => false,

                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes
                'constraints' => [
                    new Image([
                        'maxSize' => '10240k',
                        // on peut ajouter des contraintes sur les tailles en pixels...
                    ])
                ],
            ])
            // ->add('datePublication')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Annonce::class,
        ]);
    }
}


```

    * AFFICHAGE DANS TWIG
    FAIRE UNE BOUCLE

```twig

{% if annonce.categories|length > 0 %}
<div>classé dans :</div>
<ul>
    {% for categorie in annonce.categories %}
        <li>{{ categorie.label }}</li>
    {% endfor %}
</ul>
{% endif %}

```


## PAGE DE RECHERCHE PAR MOT-CLE

    CREER UNE NOUVELLE PAGE /recherche

    ET AJOUTER UN FORMULAIRE DE RECHERCHE SUR UN MOT CLE
    ET QUAND LE VISITEUR CLIQUE SUR LE BOUTON "chercher"
    ON VA AFFICHER LA LISTE DES ANNONCES DONT LE TITRE CONTIENT LE MOT-CLE

    PAUSE ET REPRISE A 11H15...

## FIREBASE POUR CHAT

    * SERVICE GRATUIT AVEC API FireBase (Google...)
    https://github.com/FirebaseExtended/firechat


## ANIMEJS

    * POUR FAIRE DES ANIMATIONS RAPIDEMENT ET FACILEMENT
    https://animejs.com/


## JAVASCRIPT AJAX

    Asynhronous
    Javascript
    And
    XML     => eXtended Markup Language

    * API FETCH
    https://developer.mozilla.org/fr/docs/Web/API/Fetch_API/Using_Fetch

    MAINTENANT ON COMBINE JS ET LE FORMAT JSON
    JSON    JavaScript Object Notation


# FRAMEWORK VUEJS V3

    V3 VERSION SORTIE IL Y A QUELQUES MOIS (FIN SEPTEMBRE 2020)
    MAIS PAS COMPLETEMENT TRADUIT EN FRANCAIS
    https://v3.vuejs.org/guide/introduction.html

    V2 TRADUITE EN FRANCAIS ET BONNE QUALITE DOC
    (MAIS CHANGEMENTS ASSEZ CONSEQUENTS ENTRE V2 ET V3...)
    https://fr.vuejs.org/v2/guide/index.html

    PAUSE ET REPRISE A 14H10...










