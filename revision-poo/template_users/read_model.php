<?php

// on mettra le read pour users
// actuellement
// pas de fonction
// pas de classe
// pas mvc

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

// view => html
