<?php require_once "create_controller.php" ?>

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