<?php

// actuellement:
// pas de fonction
// pas de classe
// DANS MVC => MODEL

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
    $db = new PDO($dsn, $DBUSER, $DBPASS);
    // pour le read...
    // https://www.php.net/manual/fr/pdo.setattribute.php
    // autre possibilité sur PDOStatement
    // https://www.php.net/manual/fr/pdostatement.setfetchmode.php
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

}
catch(PDOException $e) {
    // en cas de pépin, on a un rail de sécurité
    // https://www.php.net/manual/fr/language.exceptions.php
    die($e->getMessage());
}

