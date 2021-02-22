<?php

// controller
// traitement du formulaire
if (!empty($_POST)) {
    // on a reçu des infos de formulaire
    if (isset($_POST["id"], $_POST["email"], $_POST["pseudo"], $_POST["sexe"])
        && !empty($_POST["id"]) && !empty($_POST["email"] && !empty($_POST["pseudo"] && !empty($_POST["sexe"])))
    ) {
        // securité et validation
        // plein de verif à faire...
        $id     = intval($_POST["id"]);             // id nombre entier > 0
        $email  = strip_tags($_POST["email"]);      // email et unique
        $pseudo = strip_tags($_POST["pseudo"]);     // pas de caractères spéciaux et unique
        $sexe   = strip_tags($_POST["sexe"]);       // limiter aux choix "Madame" "Monsieur" "Autre"

        require_once "users_model.php";
        update_model($id, $email, $pseudo, $sexe);

        // on peut ajouter une redirection vers read.php

    }
    else {
        // erreur
        $erreur = "info manquante";
    }
}
