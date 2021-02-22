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

        // model
        // on commence à se connecter avec connect.php
        require_once "../connect.php";

        $sql = "INSERT INTO `users` (`email`, `pseudo`, `sexe`) VALUES (:email, :pseudo, :sexe)";

        $query = $db->prepare($sql);
        $query->bindValue("email", $email);
        $query->bindValue("pseudo", $pseudo);
        $query->bindValue("sexe", $sexe);
        $query->execute();

        // on peut ajouter une redirection vers read.php

    }
    else {
        // erreur
        $erreur = "info manquante";
    }
}

?>
<form method="POST">
    <label>
        <span>email</span>
        <input type="email" name="email" required placeholder="email">
    </label>
    <label>
        <span>pseudo</span>
        <input type="text" name="pseudo" required placeholder="pseudo">
    </label>
    <label>
        <span>sexe</span>
        <select name="sexe" required>
            <option value="Monsieur">Monsieur</option>
            <option value="Madame">Madame</option>
            <option value="Autre">Autre</option>
        </select>
    </label>

    <button type="submit">créer un user</button>
</form>