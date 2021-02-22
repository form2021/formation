<?php

class User 
{
    // propriété static
    static $db = null;

    // méthodes static

    static function connect ()
    {
        // code qui sert à se connecter à la database SQL
        // define('DBHOST', 'localhost');
        // define('DBUSER', 'root');
        // define('DBPASS', '');
        // define('DBNAME', 'revision_poo');

        $DBHOST = "localhost";
        $DBUSER = "root";
        $DBPASS = "";
        $DBNAME = "revision_poo";
        $DBPORT = 3306;     // VALEUR PAR DEFAUT...
        $dsn    = "mysql:host=$DBHOST;port=$DBPORT;dbname=$DBNAME;charset=utf8";

        try {
            User::$db = new PDO($dsn, $DBUSER, $DBPASS);
            // pour le read...
            // https://www.php.net/manual/fr/pdo.setattribute.php
            // autre possibilité sur PDOStatement
            // https://www.php.net/manual/fr/pdostatement.setfetchmode.php
            User::$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        }
        catch(PDOException $e) {
            // en cas de pépin, on a un rail de sécurité
            // https://www.php.net/manual/fr/language.exceptions.php
            die($e->getMessage());
        }


    }

    static function create_model ($email, $pseudo, $sexe)
    {
        // model
        // on commence à se connecter avec connect.php
        User::connect();

        $sql = "INSERT INTO `users` (`email`, `pseudo`, `sexe`) VALUES (:email, :pseudo, :sexe)";

        $query = User::$db->prepare($sql);
        $query->bindValue("email", $email);
        $query->bindValue("pseudo", $pseudo);
        $query->bindValue("sexe", $sexe);
        $query->execute();

    }


    static function delete_model ($id)
    {
        // model
        // on commence à se connecter avec connect.php
        User::connect();

        $sql = "DELETE FROM `users` WHERE `id` = :id";

        $query = User::$db->prepare($sql);
        $query->bindValue("id", $id);   // ca marche aussi sans :
        $query->execute();

    }

    static function read_model ()
    {
        // model
        // on commence à se connecter avec connect.php
        User::connect();

        // on récupère les lignes
        // avec la requête
        $sql = "SELECT * FROM `users`";
        // https://www.php.net/manual/fr/pdo.query.php
        $query = User::$db->query($sql);

        // on récupère les lignes sélectionnées
        $users = $query->fetchAll();        // tableau ordonné de tableaux associatifs

        return $users;  // je la renvoie pour pouvoir utiliser cette variable après l'appel
    }

    static function update_model ($id, $email, $pseudo, $sexe)
    {
        // model
        // on commence à se connecter avec connect.php
        User::connect();

        $sql = "UPDATE `users` SET `email` = :email, `pseudo` = :pseudo, `sexe` = :sexe WHERE `id` = :id";

        $query = User::$db->prepare($sql);
        $query->bindValue("id", $id);
        $query->bindValue("email", $email);
        $query->bindValue("pseudo", $pseudo);
        $query->bindValue("sexe", $sexe);
        $query->execute();

    }

}





