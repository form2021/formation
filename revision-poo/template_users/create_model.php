<?php

// model
// on commence à se connecter avec connect.php
require_once "../connect.php";

$sql = "INSERT INTO `users` (`email`, `pseudo`, `sexe`) VALUES (:email, :pseudo, :sexe)";

$query = $db->prepare($sql);
$query->bindValue("email", $email);
$query->bindValue("pseudo", $pseudo);
$query->bindValue("sexe", $sexe);
$query->execute();
