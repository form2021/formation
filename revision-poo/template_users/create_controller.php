<?php

// controller
// traitement du formulaire
if (!empty($_POST)) {
    // on a reçu des infos de formulaire
    if (isset($_POST["email"], $_POST["pseudo"], $_POST["sexe"])
        && !empty($_POST["email"] && !empty($_POST["pseudo"] && !empty($_POST["sexe"])))
    ) {
        // securité et validation
        // plein de verif à faire...
        $email  = strip_tags($_POST["email"]);      // email et unique
        $pseudo = strip_tags($_POST["pseudo"]);     // pas de caractères spéciaux et unique
        $sexe   = strip_tags($_POST["sexe"]);       // limiter aux choix "Madame" "Monsieur" "Autre"

        require_once "create_model.php";
        
        // on peut ajouter une redirection vers read.php

    }
    else {
        // erreur
        $erreur = "info manquante";
    }
}
