<?php

// ETAPE 1: DECLARATION
// => CODE EN ATTENTE
class index
{
    // PROPRIETES
    static $filename = "";

    // METHODES (conseil pour le nom: verbe)

    static function chargerCodeClasse ($nomClasse)
    {
        $chemin = "includes/*/$nomClasse.php";
        $fichiers = glob($chemin);
        if (!empty($fichiers)) require_once $fichiers[0];
    }

    function consulterCompact ()
    {
        spl_autoload_register("index::chargerCodeClasse");
        $uri = $_SERVER["REQUEST_URI"];
        extract(parse_url($uri));   // extract CREE DES VARIABLES AUTOMATIQUEMENT A PARTIR DES CLES
        if (substr($path, -1, 1) == "/") {
            $path .= "index.php";   // on complète avec index.php
        }
        extract(pathinfo($path));
        $codeTemplate = "Template::$filename";

        // je vais memoriser $filename dans une propriété statique
        // pour pouvoir réutiliser plus tard
        index::$filename = $filename;

        if (is_callable($codeTemplate)) {
            // pour les pages
            $codeTemplate();            // ON EXECUTE DU CODE DYNAMIQUEMENT
        }
        else {
            // On va chercher dans la table SQL articles 
            // si on a une ligne qui correspond à $filename sur la colonne slug
            // SELECT * FROM articles WHERE slug = :slug
            $query      = Model::lireArticle("slug", $filename);    // on envoie la requete SQL
            $article    = $query->fetch(); // fetch ramene le resultat (la ligne SQL) dans le monde PHP
            if ($article) {     // si on a une ligne
                // afficher l'article avec les infos recuperees par la requete
                Template::article($article);
            }
            else {
                // erreur 404 sinon
                header("HTTP/1.0 404 Not Found");
                Template::error404();
            }
        }
    }

    function consulter ()
    {
        // CHARGEMENT AUTOMATIQUE DE CLASSE
        // ASTUCE POUR PASSER PAR UNE METHODE (ET PAS UNE FONCTION)
        spl_autoload_register("index::chargerCodeClasse");

        // FRONT CONTROLLER
        // POINT ENTREE UNIQUE
        // => ON PEUT GERER AUTANT DE PAGES QU'ON VEUT AVEC JUSTE UN FICHIER index.php
        // echo "<h1>ON EST DANS index.php</h1>";

        // ROUTEUR
        // => AIGUILLAGE VERS LES AUTRES FICHIERS QUI CONTIENNENT LE CONTENU DE LA PAGE DEMANDEE
        // => IL FAUT QUE PHP CONNAISSE QUELLE PAGE LE NAVIGATEUR DEMANDE ?
        // exemple
        // http://localhost:8888/formation/blog-poo/page-100000?nom=toto
        // URI
        // /formation/blog-poo/page-100000?nom=toto

        $uri = $_SERVER["REQUEST_URI"];
        // ON DOIT FILTRER POUR OBTENIR SEULEMENT LE NOM DE LA PAGE A AFFICHER
        // https://www.php.net/manual/fr/function.parse-url.php
        extract(parse_url($uri));  // extract CREE DES VARIABLES AUTOMATIQUEMENT A PARTIR DES CLES
        // => $path 
        // cas particulier
        // http://localhost:8888/formation/blog-poo/
        // il faut comprendre
        // http://localhost:8888/formation/blog-poo/index.php
        if (substr($path, -1, 1) == "/") {
            $path .= "index.php";   // on complète avec index.php
        }

        // https://www.php.net/manual/fr/function.pathinfo.php
        extract(pathinfo($path));
        // => $filename

        // echo "<pre>";
        // print_r($_SERVER);
        // echo "</pre>";


        // echo "<h1>URI: $uri</h1>";
        // echo "<h1>PATH: $path</h1>";
        // echo "<h1>FILENAME: $filename</h1>";
        $codeTemplate = "Template::$filename";
        // https://www.php.net/manual/fr/function.is-callable.php
        if (is_callable($codeTemplate)) {
            // EST-CE QUE LE TEXTE EST UN CODE PHP QU'ON PEUT EXECUTER ?
            $codeTemplate();            // ON EXECUTE DU CODE DYNAMIQUEMENT
        }
        else {
            header("HTTP/1.0 404 Not Found");
            // PAGE NON TROUVEE
            Template::error404();
        }
        // echo "<h1>QUERY: $query</h1>";
        // Test::afficherHeure();
    }
}

// ETAPE 2: APPELER LA METHODE EN PASSANT PAR UN OBJET
$index = new index;
$index->consulterCompact();

// index::consulter();


