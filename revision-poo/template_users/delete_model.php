<?php

// model
// on commence à se connecter avec connect.php
require_once "../connect.php";

$sql = "DELETE FROM `users` WHERE `id` = :id";

$query = $db->prepare($sql);
$query->bindValue("id", $id);   // ca marche aussi sans :
$query->execute();
