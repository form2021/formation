<?php

class Model
{
    // PROPRIETE
    static $db = null;

    // METHODES DE CLASSE (static)
    static function connexion ()
    {
        // connexion
        define("DBHOST", "localhost");
        define("DBUSER", "root");
        define("DBPASS", "");
        define("DBNAME", "blog-poo");

        $dsn = "mysql:dbname=" . DBNAME . ";host=" . DBHOST;
        
        try{
            // On se connecte à la base de données en "instanciant" PDO
            Model::$db = new PDO($dsn, DBUSER, DBPASS);    // => PHP APPELLE LA METHODE CONSTRUCTEUR AVEC LES PARAMETRES
        
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



}