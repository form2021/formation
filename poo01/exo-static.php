<?php

class Model
{
    // PROPRIETES DE CLASSE static
    // => COLLECTIF A TOUTE LA CLASSE
    static $database = "madatabasesql";

    // PROPRIETES D'OBJET
    // => INDIVIDUEL => CHAQUE OBJET AURA SON JEU DE PROPRIETES D'OBJET
    // public / protected / private (... POUR PLUS TARD...)
    public $requete = "ma requete sql";

    // METHODES static => METHODE DE CLASSE
    // PEUVENT MANIPULER DES PROPRIETES static
    static function connexionMysql ()
    {
        echo "<h1>méthode static connexionMysql</h1>";
    }

    // METHODES D'OBJET
    // => PEUVENT MANIPULER LES PROPRIETES D'OBJETS
    function envoyerRequeteSql()
    {
        echo "<h1>méthode objet envoyerRequeteSql</h1>";

    }
}

$model = new Model;
$model->envoyerRequeteSql();

// ON PASSE PAR LA CLASSE POUR APPELER LA METHODE static
// ET ON UTILISE :: 
// https://www.php.net/manual/fr/language.oop5.paamayim-nekudotayim.php
Model::connexionMysql();