<?php require_once "update_controller.php" ?>

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
    <!-- ne pas oublier id -->
    <input type="number" name="id" required placeholder="id">

    <button type="submit">modifier un user</button>
</form>