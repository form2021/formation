<?php


// DEV COMMUN (DEV 3 ??)
// Annonce.php
class Annonce                       // CLASSE PARENTE
{
    // propriétés
    protected   $titre       = "";
    public      $description = "";
    private     $prix        = 0;   // ON PEUT BLOQUER L'ACCES DANS LES CLASSES ENFANTS AVEC private

    // methode
    public function getTitre ()
    {
        return $this->titre;
    }

    public function setTitre ($nouvelleValeur)
    {
        $this->titre = $nouvelleValeur;
    }
}

// LES CLASSES ENFANTS HERITENT DES PROPRIETES ET DES METHODES DE LA CLASSE PARENT
// QUI SONT EN VISIBLITE public ET protected

// DEV 1
// AnnonceImmo.php
class AnnonceImmo       // CLASSE ENFANT
    extends Annonce     // AVEC extends ON CREE UN LIEN D'HERITAGE ENTRE 2 CLASSES
{
    // propriétés
    public $surface     = 0;
    public $nbPiece     = 0;

    // methodes
    public function afficherDetails ()
    {
        // on peut accéder aux propriétés public et protected de la classe parente
        echo "afficherDetails: $this->titre / $this->description";

        // mais on ne peut accéder aux propriétés private
        // echo $this->prix; 
        // Warning: Undefined property: AnnonceImmo::$prix
    }

}

// DEV 2
// AnnonceVoiture.php
class AnnonceVoiture    // CLASSE ENFANT
    extends Annonce     // AVEC extends ON CREE UN LIEN D'HERITAGE ENTRE 2 CLASSES
{
    // propriétés
    public $marque          = "";
    public $moteur          = "";        // essence / diesel / etc...
    public $kilometrage     = 0;

    // methodes

}


$immo = new AnnonceImmo;

// ecriture
// $immo->titre    = "3 pièces lumineux";   // ko car protected 
$immo->setTitre("3 pièces lumineux");       // ok car public et heritage entre AnnonceImmo et Annonce

$immo->description = "très bien situé, orienté sud, grand balcon, etc...";
$immo->surface  = 50;

// lecture
// Fatal error: Uncaught Error: Cannot access protected property AnnonceImmo::$titre
// echo "<h3>$immo->titre</h3>";
echo $immo->getTitre();
echo "<hr>";
echo $immo->afficherDetails();