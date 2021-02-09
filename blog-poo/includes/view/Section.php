<?php

class Section 
{
    static function afficher($category, $titre1, $showImage)
    {
        echo "<section>";
        echo "<h1>$titre1</h1>";
        // on va ajouter une section qui affiche les articles dans la catégorie compétences
        // ICI ON VA AFFICHER LES ARTICLES
        // en poo, on utilise une méthode au lieu de faire require_once
        // on va afficher seulement les articles de la catégorie "galerie"
        $query = Model::lireArticles($category);
        
        // On récupère les données
        $articles = $query->fetchAll(); // Après un fetchAll on a TOUJOURS un foreach
        foreach($articles as $article):
            // astuce
            extract($article);  // => crée des variables à partir des clés/colonnes
                                // $id, $title, $slug, etc... 
            if ($showImage) {
                $htmlImage = 
                <<<x
                <img src="uploads/images/$picture">
                x;
            }   
            else {
                $htmlImage = "<!-- pas d'image -->";
            }   

            echo
            <<<x
                <article>
                    $htmlImage
                    <h3>$title</h3>
                    <p>$content</p>
                </article>
            x;
        endforeach;
        echo "</section>";

    }
}