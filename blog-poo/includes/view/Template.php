<?php

class Template
{
    static function index ()
    {
        Template::header();
        echo "<h1>on est sur la page index</h1>";
        Template::footer();
    }

    static function blog ()
    {
        Template::header();
        echo "<h1>on est sur la page blog</h1>";
        Template::footer();
    }

    static function contact ()
    {
        Template::header();
        echo "<h1>on est sur la page contact</h1>";
        Template::footer();
    }

    static function galerie ()
    {
        Template::header();
        echo "<h1>on est sur la page galerie</h1>";
        Template::footer();
    }

    static function error404 ()
    {
        Template::header();
        echo "<h1>désolé, page non trouvée</h1>";
        Template::footer();
    }

    static function header()
    {
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mon blog POO</title>
</head>
<body>
    <header>
        <nav>
            <a href="index.php">accueil</a>
            <a href="galerie.php">galerie</a>
            <a href="blog.php">blog</a>
            <a href="contact.php">contact</a>
        </nav>
    </header>
    <main>


<?php
    }

    static function footer ()
    {
?>
    </main>
    <footer>
        <p>tous droits réservés</p>
    </footer>
</body>
</html>
<?php
    }

}