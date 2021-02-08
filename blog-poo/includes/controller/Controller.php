<?php

class Controller
{
    static function traiterFormulaire ()
    {
        if (!empty($_POST)) {
            // on a reçu des infos de formulaire
            if (
                isset($_POST["title"], $_POST["content"], $_POST["category"], $_POST["slug"], $_POST["picture"], $_POST["priority"], )
                && !empty($_POST["title"]) 
                && !empty($_POST["content"]) 
                && !empty($_POST["category"]) 
                && !empty($_POST["slug"]) 
                && !empty($_POST["picture"]) 
                && !empty($_POST["priority"])
            ) {
                // TODO: AJOUTER FILTRES SECURITE



                // SQL
                Model::connexion();
                // On écrit la requête
                $sql = 
                <<<sql
                INSERT INTO `articles`
                (`title`, `content`, `picture`, `slug`, `category`, `priority`) 
                VALUES 
                (:title, :content, :picture, :slug, :category, :priority)
                sql;

                // On prépare la requête
                $query = Model::$db->prepare($sql);

                // On injecte les paramètres
                // $query->bindValue(":titre", $titre, PDO::PARAM_STR);
                // $query->bindValue(":contenu", $contenu, PDO::PARAM_STR);

                // On exécute (TODO: AJOUTER SECURITE...)
                $query->execute([
                    "title"     => $_POST["title"],
                    "content"   => $_POST["content"],
                    "picture"   => $_POST["picture"],
                    "slug"      => $_POST["slug"],
                    "category"  => $_POST["category"],
                    "priority"  => $_POST["priority"],
                ]);

                // On récupère l'id du dernier insert dans la base
                $idArticle = Model::$db->lastInsertId();
                
            }
            // DEBUG
            echo "<h3>ICI ON VA TRAITER LE FORMULAIRE</h3>";
        }
    }
}