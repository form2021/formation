# formation dev fullstack

    https://github.com/form2021/formation

## liveshare

    lundi 22/02
    
https://prod.liveshare.vsengsaas.visualstudio.com/join?2CA665E7A5E7475286AA0DBB730260A4D31F

## questions ??

## activités pour la journée 

    * dernière journée sur Symfony
    * dernière journée de cours sur la formation
    * dernière journée avant exam final


    => révision pour demain
    => révision et exo après-midi

    crud avec sql et jointures
    code poo
    et après-midi pratique

    * sujet

    au moins 2 tables sql avec jointures OneToMany et ManyToMany
    database    revision_poo

    users
        id          INT                 INDEX=PRIMARY       A_I
        email       VARCHAR(255)
        pseudo      VARCHAR(255)
        sexe        ENUM("Monsieur", "Madame", "Autre")

        => OneToMany    Un article est publié par un auteur

    articles
        id                  INT         INDEX=PRIMARY       A_I
        titre               VARCHAR(255)
        contenu             TEXT
        date_publication    DATETIME
        user_id             INT         => CLE ETRANGERE VERS users

        => ManyToMany   Un article peut être classé dans plusieurs catégories
        => IL FAUT UNE TABLE EN PLUS...

    categories
        id          INT                 INDEX=PRIMARY       A_I
        label       VARCHAR(255)
        description TEXT

    articles_categories
        article_id      INT         => CLE ETRANGERE VERS articles
        categorie_id    INT         => CLE ETRANGERE VERS categories

    exemple avec colonne ENUM

    NOTE: UN ManyToMany EST UNE COMBINAISON DE 2 OneToMany
        => 2 COLONNES DE CLES ETRANGERES

    
    CREER DES PAGES CRUD SUR TOUTES CES TABLES...

    AUTONOMIE: (CHECKPOINT A 10H00...)
    * CREER LES 4 TABLES SQL AVEC PHPMYADMIN OU EN MODE CODE SQL...
        TOUS LES CHAMPS SONT OBLIGATOIRES

## CLES PRIMAIRES ET CLES COMPOSITES

    https://openclassrooms.com/fr/courses/1959476-administrez-vos-bases-de-donnees-avec-mysql/1963057-cles-primaires-et-etrangeres

    * CLE COMPOSITE

```sql

ALTER TABLE nom_table
ADD [CONSTRAINT [symbole_contrainte]] PRIMARY KEY (colonne_pk1 [, colonne_pk2, ...]);


ALTER TABLE `articles_categories`
  ADD PRIMARY KEY (`article_id`, `categorie_id`);


ALTER TABLE articles_categories
ADD CONSTRAINT cle_composite_articles_categories PRIMARY KEY (article_id, categorie_id)


```

### AJOUTER LES PAGES CRUD POUR CHAQUE TABLE SQL

    COMMENCER PAR UN CRUD SUR UNE TABLE SQL

    NOTE: CHOIX LE PLUS SIMPLE => categories

    VOTRE CHOIX: LA TABLE SQL users

    CREER LE CODE PHP POUR EFFECTUER UN CRUD

    * PREMIER OBJECTIF:     AVOIR UN CODE QUI MARCHE
    * DEUXIEME OBJECTIF:    AVOIR UN CODE MVC 
    * TROISIEME OBJECTIF:   AVOIR UN CODE EN PROGRAMMATION ORIENTE OBJET

    BASE:
        CREER UN DOSSIER revision-poo/
        CHOISIR LE NOMBRE DE PAGES/FICHIERS POUR LE CRUD SUR users
        (GARDER EN TETE QU'ON DEVRA FAIRE UN CRUD POUR CHAQUE TABLE SQL...)

    PAUSE ET REPRISE 11H15

    AUTONOMIE ET CHECKPOINT A 11H45...














































