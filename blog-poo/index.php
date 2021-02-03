<?php

// FRONT CONTROLLER
// POINT ENTREE UNIQUE
// => ON PEUT GERER AUTANT DE PAGES QU'ON VEUT AVEC JUSTE UN FICHIER index.php
echo "<h1>ON EST DANS index.php</h1>";

// ROUTEUR
// => AIGUILLAGE VERS LES AUTRES FICHIERS QUI CONTIENNENT LE CONTENU DE LA PAGE DEMANDEE
// => IL FAUT QUE PHP CONNAISSE QUELLE PAGE LE NAVIGATEUR DEMANDE ?
// exemple
// http://localhost:8888/formation/blog-poo/page-100000?nom=toto
// URI
// /formation/blog-poo/page-100000?nom=toto

$uri = $_SERVER["REQUEST_URI"];
// ON DOIT FILTRER POUR OBTENIR SEULEMENT LE NOM DE LA PAGE A AFFICHER
// https://www.php.net/manual/fr/function.parse-url.php
extract(parse_url($uri));  // extract CREE DES VARIABLES AUTOMATIQUEMENT A PARTIR DES CLES
// => $path 
// cas particulier
// http://localhost:8888/formation/blog-poo/
// il faut comprendre
// http://localhost:8888/formation/blog-poo/index.php
if (substr($path, -1, 1) == "/") {
    $path .= "index.php";   // on complète avec index.php
}

// https://www.php.net/manual/fr/function.pathinfo.php
extract(pathinfo($path));
// => $filename

// echo "<pre>";
// print_r($_SERVER);
// echo "</pre>";


echo "<h1>URI: $uri</h1>";
echo "<h1>PATH: $path</h1>";
echo "<h1>FILENAME: $filename</h1>";
// echo "<h1>QUERY: $query</h1>";