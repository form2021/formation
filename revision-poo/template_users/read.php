<?php 

require_once "users_model.php"; // chargement des déclarations de fonctions
$users = User::read_model();                   // on appelle la fonction read_model 

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
            <a href="delete_controller.php?id=<?php echo $user["id"] ?>">supprimer</a>
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
            <a href="delete_controller.php?id=$id">supprimer</a>
        </td>
    </tr>
    x;
}
?>    
    </tbody>
</table>

