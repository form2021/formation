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
    database    revision_poo    AVEC CHARSET utf8mb4_general_ci

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

    
    ASTUCE:
    LES CONSTRAINTES SONT DES SECURITES 
    MAIS NE SONT PAS NECESSAIRES POUR REALISER DES JOINTURES DANS UNE REQUETE SQL
    => ON PEUT SE FACILITER LE DEVELOPPEMENT 
        EN LAISSANT LES COLONNES DE CLE ETRANGERE SANS CONTRAINTE
        ET AJOUTER LES CONTRAINTES DE CLE ETRANGERE EN FIN DE DEVELOPPEMENT 

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


-- code symfony
CREATE TABLE annonce_categorie 
(
    annonce_id INT NOT NULL, 
    categorie_id INT NOT NULL, 
    INDEX IDX_3C5A3DA68805AB2F (annonce_id), 
    INDEX IDX_3C5A3DA6BCF5E72D (categorie_id), 
    PRIMARY KEY(annonce_id, categorie_id)
) 
DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB

```

    AVEC SYMFONY:


```php

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE annonce_categorie (annonce_id INT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_3C5A3DA68805AB2F (annonce_id), INDEX IDX_3C5A3DA6BCF5E72D (categorie_id), PRIMARY KEY(annonce_id, categorie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE annonce_categorie ADD CONSTRAINT FK_3C5A3DA68805AB2F FOREIGN KEY (annonce_id) REFERENCES annonce (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE annonce_categorie ADD CONSTRAINT FK_3C5A3DA6BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
    }


```

### AJOUTER LES PAGES CRUD POUR CHAQUE TABLE SQL

    COMMENCER PAR UN CRUD SUR UNE TABLE SQL

    NOTE: CHOIX LE PLUS SIMPLE => categories

    VOTRE CHOIX: LA TABLE SQL users

    CREER LE CODE PHP POUR EFFECTUER UN CRUD
    ORDRE PRATIQUE:
    * CREATE
    * READ
    * DELETE        => SUR id POUR SAVOIR QUELLE LIGNE SUPPRIMER
    * UPDATE        => GARDER POUR LA FIN CAR LE PLUS DIFFICILE


    * PREMIER OBJECTIF:     AVOIR UN CODE QUI MARCHE
    * DEUXIEME OBJECTIF:    AVOIR UN CODE ORGANISE EN MVC 
    * TROISIEME OBJECTIF:   AVOIR UN CODE EN PROGRAMMATION ORIENTE OBJET

    BASE:
        CREER UN DOSSIER revision-poo/
        CHOISIR LE NOMBRE DE PAGES/FICHIERS POUR LE CRUD SUR users
        (GARDER EN TETE QU'ON DEVRA FAIRE UN CRUD POUR CHAQUE TABLE SQL...)

    PAUSE ET REPRISE 11H15

    AUTONOMIE ET CHECKPOINT A 11H45...

    NE PAS HESITER A POSER DES QUESTIONS...

    NOUVEAU CHECKPOINT A 12H...

    * READ
    On affiche les infos dans des balises HTML table
        (comme phpmyadmin...)

    SI ON DEMARRE AVEC LE READ, IL FAUT DES LIGNES A AFFICHER
    => INSERER LES LIGNES AVEC PHPMYADMIN...


    PAUSE DEJEUNER ET REPRISE A 14H...

## ACTIVITES SUR LE CRUD

    CONTINUER EN AUTONOMIE SUR UN CRUD SUR LA TABLE users
    => CHECKPOINT A 14H35...

    PAUSE ET REPRISE 15H45...

    FIN DE JOURNEE ET BONNE SOIREE ;-p








































