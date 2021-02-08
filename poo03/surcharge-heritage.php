<?php

class Salarie
{
    // methodes d'objet
    function travailler ()
    {
        echo "<h3>je travaille comme Salarie...</h3>";
    }

    // methodes static
    static function afficherStatic ()
    {
        echo "<h3>afficher static Salarie</h3>";
    }
}

// ON PEUT UN CODE PARTICULIER SUIVANT CHAQUE POSTE
class Graphiste
    extends Salarie     // HERITAGE AVEC CLASSE PARENT Salarie
{
    // methodes static
    static function afficherStatic ()
    {
        echo "<h3>afficher static Graphiste</h3>";
    }

    // methodes d'objet
    function travailler ()
    {
        // on peut appeler une méthode static avec ::
        Salarie::afficherStatic();
        Graphiste::afficherStatic();

        // on peut executer le code dans la classe parent
        // bricolage pas cohérent car travailler n'est pas une méthode static
        // plus cohérent d'écrire parent->travailler();
        parent::travailler();

        // $this->travailler(); // ERREUR BOUCLE INFINIE...

        // et on complète avec du code supplémentaire
        echo "<h3>je travaille avec Illustrator</h3>";
    }

}


$equipe = [
    "graphiste" => new Graphiste,       // ON PRECISE LA CLASSE
    "dev-front" => new Salarie,
    "dev-back"  => new Salarie,
];

// CE CODE EST GENERAL => RESTE IDENTIQUE
foreach($equipe as $element)
{
    // astuce: on appelle la meme methode travailler 
    // mais on va executer un code different suivant la classe de l'objet
    $element->travailler();
}