# formation dev fullstack

    https://github.com/form2021/formation

## liveshare

    mardi 23/02

https://prod.liveshare.vsengsaas.visualstudio.com/join?CE942E61E23D100BDA97A7E066A7113C0AFB

## questions ??

    2 TABLES SQL
    SE POSER LA QUESTION DANS LES 2 SENS
    * POUR UNE LIGNE DE LA TABLE1 COMBIEN DE LIGNES SONT ASSOCIEES DANS LA TABLE 2 ?
    * POUR UNE LIGNE DE LA TABLE2 COMBIEN DE LIGNES SONT ASSOCIEES DANS LA TABLE 1 ?

    => SUIVANT LA REPONSE => ON A LA CARDINALITE DE LA RELATION
    * OneToOne
    * OneToMany
    * ManyToMany

    Exemple:
    TABLE1 users
    TABLE2 articles

    * POUR UNE LIGNE DE LA TABLE users COMBIEN DE LIGNES SONT ASSOCIEES DANS LA TABLE articles ?
    => Un user PEUT CREER PLUSIEURS articles
                            => MANY
    * POUR UNE LIGNE DE LA TABLE articles COMBIEN DE LIGNES SONT ASSOCIEES DANS LA TABLE users ?
    => UN article NE PEUT AVOIR ETE PUBLIE QUE PAR UN SEUL user
                                                    => ONE
    => MANY TO ONE OU ONE TO MANY (SUIVANT LE SENS...)
    => EN PRATIQUE: AJOUTE UNE COLONNE DE CLE ETRANGERE DANS LA TABLE MANY (articles)
                        => ON CREE UNE COLONNE user_id DE TYPE INT DANS LA TABLE articles
                        => CAR ON VA DONNER COMME VALEUR DES NOMBRES 
                            QUI CORRESPONDENT A LA CLE PRIMAIRE id DANS LA TABLE users

    SI JE VEUX AFFICHER TOUS LES ARTICLES ET LE PSEUDO DE LEUR AUTEUR
    => REQUETE SQL

```sql
    SELECT *
    FROM articles
    INNER JOIN users
    ON users.id = articles.user_id
```
    Exemple:
    TABLE1 articles
                id
                titre
    TABLE2 categories
                id
                label
    TABLE3  articles_categories
                article_id
                categorie_id

    * POUR UNE LIGNE DE LA TABLE articles COMBIEN DE LIGNES SONT ASSOCIEES DANS LA TABLE categories ?
    => MANY
    => ON PEUT RANGER UN ARTICLE DANS PLUSIEURS CATEGORIES
    * POUR UNE LIGNE DE LA TABLE categories COMBIEN DE LIGNES SONT ASSOCIEES DANS LA TABLE articles ?
    => MANY
    => UNE CATEGORIE PEUT CONTENIR PLUSIEURS ARTICLES

    => MANY TO MANY

    => EN PRATIQUE: CREER UNE TABLE DE RELATION INTERMEDIAIRE AVEC 2 COLONNES DE CLES ETRANGERES

    JE VEUX AFFICHER TOUS LES ARTICLES ET AUSSI LES CATEGORIES DE CHAQUE ARTICLE
    REQUETE SQL:

```sql
    SELECT * FROM articles
    INNER JOIN articles_categories
        ON articles_categories.article_id = articles.id
    INNER JOIN categories
        ON categories.id = articles_categories.categorie_id
```

    NOTE: TESTER AUSSI AVEC LEFT JOIN... 
            (SI UN ARTICLE PEUT NE PAS ETRE CONNECTE A UNE CATEGORIE...)

    ATTENTION: DETECTER LES MANY TO MANY LE PLUS TOT POSSIBLE CAR PLUS DE TRAVAIL A PREVOIR...


## Planning de la journée

09H00-10H45     Q&A
10H45-11H00     PAUSE
11H00-11H30     QCM
11H30-12H00     CORRIGE
12H00-13H00     PAUSE DEJEUNER
13H00-17H00     EXAM FINAL


