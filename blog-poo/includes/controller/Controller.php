<?php
// ICI ON POURRAIT RANGER NOTRE CLASSE DANS UN NAMESPACE
// namespace MonProjet;

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
                    "title"         => Controller::filtrerTexte("title"),
                    "content"       => Controller::filtrerTexte("content"),
                    "picture"       => Controller::filtrerTexte("picture"),
                    "slug"          => Controller::filtrerTexte("slug"),
                    "category"      => Controller::filtrerTexte("category"),
                    "priority"      => Controller::filtrerTexte("priority"),
                    "created_at"    => date("Y-m-d H:i:s"),     // remplissage automatique avec la date actuelle
                ];

                // on appelle la methode insererArticle pour inserer dans la database SQL
                Model::insererArticle($tableauAsso);

                // Model::insererDanger($tableauAsso);
            }
            // DEBUG
            echo "<h3>ICI ON VA TRAITER LE FORMULAIRE</h3>";
        }
    }

    static function filtrerTexte ($cle)
    {
        $infoExterieur = $_POST["$cle"] ?? "";              // ?? => isset
        // on va filtrer cette info
        $infoExterieur = strip_tags($infoExterieur);        // enleve les balises HTML et PHP
        $infoExterieur = trim($infoExterieur);              // enleve les espaces en trop au debut et a la fin

        return $infoExterieur;
    }
}