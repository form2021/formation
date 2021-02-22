<?php

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
