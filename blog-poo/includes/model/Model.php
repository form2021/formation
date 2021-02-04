<?php

class Model
{
    // METHODES
    static function lireArticles ()
    {
        // connexion
        define("DBHOST", "localhost");
        define("DBUSER", "root");
        define("DBPASS", "");
        define("DBNAME", "blog-poo");
        
        $dsn = "mysql:dbname=" . DBNAME . ";host=" . DBHOST;
        
        try{
            // On se connecte à la base de données en "instanciant" PDO
            $db = new PDO($dsn, DBUSER, DBPASS);    // => PHP APPELLE LA METHODE CONSTRUCTEUR AVEC LES PARAMETRES
        
            // On définit le charset à "utf8"
            $db->exec("SET NAMES utf8");
        
            // On définit la méthode de récupération (fetch) des données
            $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        
        }
        catch (PDOException $e){
            // PDOEException $e -> on attrape l'erreur provoquée par le new PDO en cas d'échec
            // On affiche le
            die($e->getMessage());
        }
                // requete SQL
        // Ici on affichera les articles
        // On récupère les données dans la base
        // On écrit la requête
        $sql    = "SELECT * FROM `articles`";
        $query  = $db->query($sql);

        return $query;      // la méthode ne transmet pas la variable sinon
    }
}