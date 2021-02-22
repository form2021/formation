<?php

// ici on récupère l'id de la ligne à supprimer 
// et on envoie la requête sql
// controller
// traitement du formulaire
if (!empty($_GET)) {
    // on a reçu des infos de formulaire
    if (isset($_GET["id"]) && !empty($_GET["id"])) {
        // securité et validation
        // plein de verif à faire...
        $id     = intval($_GET["id"]);      // convertir en nombre

        require_once "users_model.php";
        delete_model($id);
        
        // on peut ajouter une redirection vers read.php

    }
    else {
        // erreur
        $erreur = "info manquante";
    }
}
