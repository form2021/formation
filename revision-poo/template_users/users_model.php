<?php

function create_model ($email, $pseudo, $sexe)
{
    // model
    // on commence à se connecter avec connect.php
    require_once "../connect.php";

    $sql = "INSERT INTO `users` (`email`, `pseudo`, `sexe`) VALUES (:email, :pseudo, :sexe)";

    $query = $db->prepare($sql);
    $query->bindValue("email", $email);
    $query->bindValue("pseudo", $pseudo);
    $query->bindValue("sexe", $sexe);
    $query->execute();

}


function delete_model ($id)
{
    // model
    // on commence à se connecter avec connect.php
    require_once "../connect.php";

    $sql = "DELETE FROM `users` WHERE `id` = :id";

    $query = $db->prepare($sql);
    $query->bindValue("id", $id);   // ca marche aussi sans :
    $query->execute();

}

function read_model ()
{
    // model
    // on commence à se connecter avec connect.php
    require_once "../connect.php";

    // on récupère les lignes
    // avec la requête
    $sql = "SELECT * FROM `users`";
    // https://www.php.net/manual/fr/pdo.query.php
    $query = $db->query($sql);

    // on récupère les lignes sélectionnées
    $users = $query->fetchAll();        // tableau ordonné de tableaux associatifs

    return $users;  // je la renvoie pour pouvoir utiliser cette variable après l'appel
}

function update_model ($id, $email, $pseudo, $sexe)
{
    // model
    // on commence à se connecter avec connect.php
    require_once "../connect.php";

    $sql = "UPDATE `users` SET `email` = :email, `pseudo` = :pseudo, `sexe` = :sexe WHERE `id` = :id";

    $query = $db->prepare($sql);
    $query->bindValue("id", $id);
    $query->bindValue("email", $email);
    $query->bindValue("pseudo", $pseudo);
    $query->bindValue("sexe", $sexe);
    $query->execute();

}




