<?php
// on mettra le read pour users

// on commence à se connecter avec connect.php
require_once "../connect.php";

// on récupère les lignes
// avec la requête
$sql = "SELECT * FROM `users`";
// https://www.php.net/manual/fr/pdo.query.php
$query = $db->query($sql);

// on récupère les lignes sélectionnées
$users = $query->fetchAll();        // tableau ordonné de tableaux associatifs

?>
<table>
    <thead>
        <tr>
            <td>id</td>
            <td>email</td>
            <td>pseudo</td>
            <td>sexe</td>
        </tr>
    </thead>
    <tbody>
<?php foreach ($users as $user) : ?>
    <tr>
        <td><?php echo $user["id"] ?></td>
        <td><?= $user["email"] ?></td>
        <td><?= $user["pseudo"] ?></td>
        <td><?= $user["sexe"] ?></td>
    </tr>
<?php endforeach; ?>
    </tbody>
</table>

