<?php

// on cherche la liste des fichiers .php 
// $fichiers = glob("*.php");

// on cherche les fichiers dont le nom contient -
// $fichiers = glob("*-*.php");

// $fichiers = glob("exo-*.php");

// le résultat est un fichier ordonné
$fichiers = glob("../*.jpg");

print_r($fichiers);
