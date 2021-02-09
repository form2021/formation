<?php

// EMBAUCHER UN DEV QUI CONNAIT SQL, MAIS PAS DE CONNAITRE HTML
class Model
    implements Contrat
{
    // PROPRIETE
    static $db = null;      // pas de connexion

    // METHODES DE CLASSE (static)
    static function connexion ()
    {
        // on améliore le code pour ne faire la connexion qu'une seule fois
        if (Model::$db == null)
        {
            // on fait la connexion une seule fois
            // connexion
            define("DBHOST", "localhost");
            define("DBUSER", "root");
            define("DBPASS", "");
            define("DBNAME", "blog-poo");

            $dsn = "mysql:dbname=" . DBNAME . ";host=" . DBHOST;
            
            try{
                // On se connecte à la base de données en "instanciant" PDO
                Model::$db = new PDO($dsn, DBUSER, DBPASS);    // => PHP APPELLE LA METHODE CONSTRUCTEUR AVEC LES PARAMETRES
                // => ici on aura une valeur dans Model::$db != null

                // On définit le charset à "utf8"
                Model::$db->exec("SET NAMES utf8");
            
                // On définit la méthode de récupération (fetch) des données
                Model::$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            
            }
            catch (PDOException $e) {
                // PDOEException $e -> on attrape l'erreur provoquée par le new PDO en cas d'échec
                // On affiche le
                die($e->getMessage());
            }
        }
        
    }

    // READ liste
    static function lireArticles ($category = "news")
    {
        Model::connexion();

        // requete SQL
        // Ici on affichera les articles
        // On récupère les données dans la base
        // On écrit la requête
        $sql        = "SELECT * FROM `articles` WHERE category = '$category'";
        $query      = Model::$db->query($sql);

        return $query;      // la méthode ne transmet pas la variable sinon
    }

    // READ 1 ligne
    static function lireArticle ($colonne, $valeurCherchee)
    {        
        Model::connexion();

        // requete SQL
        // Ici on affichera les articles
        // On récupère les données dans la base
        // On écrit la requête
        $sql    = "SELECT * FROM articles WHERE $colonne = :$colonne";
        $query  = Model::$db->prepare($sql);
        // $query->bindValue($colonne, $valeurCherchee);
        $query->execute([ $colonne => $valeurCherchee ]);

        return $query;      // la méthode ne transmet pas la variable sinon
    }


    // methode pour inserer une ligne dans la table SQL articles
    static function insererArticle ($tableauAsso)
    {
        // SQL
        Model::connexion();
        // On écrit la requête
        $sql = 
        <<<sql
        INSERT INTO `articles`
        (`title`, `content`, `picture`, `slug`, `category`, `priority`, `created_at`) 
        VALUES 
        (:title, :content, :picture, :slug, :category, :priority, :created_at)
        sql;

        // On prépare la requête
        $query = Model::$db->prepare($sql);

        // On injecte les paramètres
        // $query->bindValue(":titre", $titre, PDO::PARAM_STR);
        // $query->bindValue(":contenu", $contenu, PDO::PARAM_STR);

        // On exécute (TODO: AJOUTER SECURITE...)
        $query->execute($tableauAsso);

        // On récupère l'id du dernier insert dans la base
        $idArticle = Model::$db->lastInsertId();

    }


    function faireClauseBlaBla ()
    {
        // J'AI PAS FINI MAIS CA DEBLOQUE LA SITUATION
        // JE SUIS RESPONSABLE DANS LE BLOC {}
    }

}