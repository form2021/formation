<?php

//  EMBAUCHER UN DEV QUI CONNAIT HTML, MAIS PAS BESOIN DE SQL
class Template
{
    // chaque page est une méthode de classe Template
    static function index ()
    {
        Template::header();
        echo "<h1>on est sur la page index</h1>";
        Template::footer();
    }

    static function article ($article)
    {
        Template::header();
        // astuce
        extract($article);  // => crée des variables à partir des clés/colonnes
                            // $id, $title, $slug, etc...
        $dateAffichee = date("d/m/Y à H:i:s", strtotime($created_at));
        
        echo
        <<<x
            <article>
                <h3><a href="./$slug.php">$title</a></h3>
                <p>Article écrit le $dateAffichee dans $category</p>
                <div>$content</div>
            </article>
        x;

        Template::footer();

    }

    static function blog ()
    {
        Template::header();
        echo "<h1>on est sur la page blog</h1>";
        // ICI ON VA AFFICHER LES ARTICLES
        // en poo, on utilise une méthode au lieu de faire require_once
        // on va afficher seulement les articles de la catégorie "news"
        $query = Model::lireArticles();

        // On récupère les données
        $articles = $query->fetchAll(); // Après un fetchAll on a TOUJOURS un foreach
        foreach($articles as $article):
            // astuce
            extract($article);  // => crée des variables à partir des clés/colonnes
                                // $id, $title, $slug, etc...
            $dateAffichee = date("d/m/Y à H:i:s", strtotime($created_at));
            
            echo
            <<<x
                <article>
                    <h3><a href="./$slug.php">$title</a></h3>
                    <p>Article écrit le $dateAffichee dans $category</p>
                    <div>$content</div>
                </article>
            x;
        endforeach;
            
            
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
        // ICI ON VA AFFICHER LES ARTICLES
        // en poo, on utilise une méthode au lieu de faire require_once
        // on va afficher seulement les articles de la catégorie "galerie"
        $query = Model::lireArticles("galerie");
        
        // On récupère les données
        $articles = $query->fetchAll(); // Après un fetchAll on a TOUJOURS un foreach
        foreach($articles as $article):
            // astuce
            extract($article);  // => crée des variables à partir des clés/colonnes
                                // $id, $title, $slug, etc...
            $dateAffichee = date("d/m/Y à H:i:s", strtotime($created_at));
            
            echo
            <<<x
                <article>
                    <img src="uploads/images/$picture" title="$title">
                </article>
            x;
        endforeach;

        Template::footer();
    }

    static function admin ()
    {
        Template::header();
        echo "<h1>on est sur la page admin</h1>";
        echo
        <<<x
            <section>
                <h3>formulaire de création d'article</h3>
                <form method="POST">
                    <label>
                        <div>titre</div>
                        <input name="title" type="text" required placeholder="entrez le titre">
                    </label>
                    <label>
                        <div>slug</div>
                        <input name="slug" type="text" required placeholder="entrez le slug">
                    </label>
                    <label>
                        <div>picture</div>
                        <input name="picture" type="text" required placeholder="entrez le chemin pour picture">
                    </label>
                    <label>
                        <div>categorie</div>
                        <input name="category" type="text" required placeholder="entrez la catégorie">
                    </label>
                    <label>
                        <div>priorité</div>
                        <input name="priority" type="text" required placeholder="entrez la priorité">
                    </label>
                    <label>
                        <div>contenu</div>
                        <textarea name="content" rows="6" cols="80" required placeholder="entrez le contenu"></textarea>
                    </label>
                    <div>
                        <button type="submit">PUBLIER L'ARTICLE</button>
                    </div>
                </form>   
            </section>
        x;

        // séparation MVC: on sépare le code de traitement dans une partie controller
        Controller::traiterFormulaire();

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

    <link rel="stylesheet" href="css/style.css">
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
        <nav>
            <a href="credits.php">crédits</a>
            <a href="mentions-legales.php">mentions légales</a>
        </nav>
        <nav>
            <a href="admin.php">admin</a>
        </nav>
        <p>tous droits réservés</p>
    </footer>
</body>
</html>
<?php
    }

}