<?php
// on mettra le read pour users
// actuellement
// pas de fonction
// pas de classe
// pas mvc

// model
// on commence à se connecter avec connect.php
require_once "../connect.php";

// on récupère les lignes
// avec la requête
$sql = "SELECT * FROM `users`";
// https://www.php.net/manual/fr/pdo.query.php
$query = $db->query($sql);

// on récupère les lignes sélectionnées
$users = $query->fetchAll();        // tableau ordonné de tableaux associatifs

// view => html
?>
<!--
<table>
    <thead>
        <tr>
            <td>id</td>
            <td>email</td>
            <td>pseudo</td>
            <td>sexe</td>
            <td>supprimer</td>
        </tr>
    </thead>
    <tbody>
<?php foreach ($users as $user) : ?>
    <tr>
        <td><?php echo $user["id"] ?></td>
        <td><?= $user["email"] ?></td>
        <td><?= $user["pseudo"] ?></td>
        <td><?= $user["sexe"] ?></td>
        <td>
            <a href="delete.php?id=<?php echo $user["id"] ?>">supprimer</a>
        </td>
    </tr>
<?php endforeach; ?>
    </tbody>
</table>
-->

<table>
    <thead>
        <tr>
            <td>id</td>
            <td>email</td>
            <td>pseudo</td>
            <td>sexe</td>
            <td>supprimer</td>
        </tr>
    </thead>
    <tbody>
<?php 
foreach ($users as $user) {
    // astuce du extract
    extract($user); // => créé les variables $id, $email, $pseudo, $sexe
    echo 
    <<<x
    <tr>
        <td>$id</td>
        <td>$email</td>
        <td>$pseudo</td>
        <td>$sexe</td>
        <td>
            <a href="delete.php?id=$id">supprimer</a>
        </td>
    </tr>
    x;
}
?>    
    </tbody>
</table>

