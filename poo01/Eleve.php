<?php

class Eleve
{
    // PROPRIETES static => COLLECTIF
    static $heureDebut = "09H";
    static $heureFin   = "17H30";

    // PROPRIETES D'OBJET => INDIVIDUEL
    public $nom = "";
}

Eleve::$heureFin = "17H";       // COLLECTIF

$eleve1 = new Eleve;            // PHP CREE UN JEU DE PROPRIETES D'OBJET POUR CHAQUE OBJET
$eleve1->nom = "georges";       // INDIVIDUEL A CHAQUE OBJET

$eleve2 = new Eleve;
$eleve2->nom = "julie";

// TABLE SQL    voiture
//      COLONNES      id   marque   annee       => PROPRIETES D'OBJET
//      LIGNES         1   renault  2010
//                     2   citroen  2015
//      ...

class Voiture
{
    // PROPRIETE COLLECTIVE
    static $nbLigne = 0;

    // PROPRIETE D'OBJET => CARACTERISTIQUES DES OBJETS DE CETTE CLASSE
    public $id = "";
    public $marque = "";
    public $annee = "";
}

Voiture::$nbLigne = 2;

$ligne1 = new Voiture;
$ligne1->id = 1;
$ligne1->marque = "renault";
$ligne1->annee = 2010;

$ligne2 = new Voiture;
$ligne2->id = 2;
$ligne2->marque = "citroen";
$ligne2->annee = 2005;














