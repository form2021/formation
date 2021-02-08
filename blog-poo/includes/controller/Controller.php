<?php

// EMBAUCHER UN DEV QUI CONNAIT PHP, MAIS PAS BESOIN DE SQL NI HTML
class Controller
{
    static function traiterFormulaire ()
    {
        if (!empty($_POST)) {
            // on a reçu des infos de formulaire
            if (
                isset($_POST["title"], $_POST["content"], $_POST["category"], $_POST["slug"], $_POST["picture"], $_POST["priority"])
                && !empty($_POST["title"]) 
                && !empty($_POST["content"]) 
                && !empty($_POST["category"]) 
                && !empty($_POST["slug"]) 
                && !empty($_POST["picture"]) 
                && !empty($_POST["priority"])
            ) {
                // TODO: AJOUTER FILTRES SECURITE
                $tableauAsso = [
                    "title"         => $_POST["title"],
                    "content"       => $_POST["content"],
                    "picture"       => $_POST["picture"],
                    "slug"          => $_POST["slug"],
                    "category"      => $_POST["category"],
                    "priority"      => $_POST["priority"],
                    "created_at"    => date("Y-m-d H:i:s"),     // remplissage automatique avec la date actuelle
                ];

                // on appelle la methode insererArticle
                Model::insererArticle($tableauAsso);
            }
            // DEBUG
            echo "<h3>ICI ON VA TRAITER LE FORMULAIRE</h3>";
        }
    }
}