<?php
// ICI ON POURRAIT RANGER NOTRE CLASSE DANS UN NAMESPACE
// namespace MonProjet;

// EMBAUCHER UN DEV QUI CONNAIT PHP, MAIS PAS BESOIN DE SQL NI HTML
class Controller
{
    static $tabErreur = [];             // memorise les erreurs du formulaire

    static function traiterFormulaire ()
    {
        if (!empty($_POST)) {
            // on a reçu des infos de formulaire
            // TODO: AJOUTER FILTRES SECURITE
            $tableauAsso = [
                "title"         => Controller::filtrerTexte("title"),
                "content"       => Controller::filtrerTexte("content"),
                "picture"       => Controller::filtrerUpload("picture"),
                "slug"          => Controller::filtrerTexte("slug"),
                "category"      => Controller::filtrerTexte("category"),
                "priority"      => Controller::filtrerTexte("priority"),
                "created_at"    => date("Y-m-d H:i:s"),     // remplissage automatique avec la date actuelle
            ];

            // tester si le tableau d'erreur est vide
            if (empty(Controller::$tabErreur)) {
                // on appelle la methode insererArticle pour inserer dans la database SQL
                Model::insererArticle($tableauAsso);

                // DEBUG
                echo "<strong>votre article est publié</strong>";

                // Model::insererDanger($tableauAsso);
            }
            else {
                // il y a des erreurs
                // afficher les erreurs
                echo "<strong>il y a des erreurs: </strong>";
                foreach(Controller::$tabErreur as $erreur) {
                    echo 
                    <<<x
                    <div class="erreur">$erreur</div>
                    x;
                }
            }
        }
    }

    static function filtrerTexte ($cle)
    {
        $infoExterieur = $_POST["$cle"] ?? "";              // ?? => isset
        // on va filtrer cette info
        $infoExterieur = strip_tags($infoExterieur);        // enleve les balises HTML et PHP
        $infoExterieur = trim($infoExterieur);              // enleve les espaces en trop au debut et a la fin

        // est-ce que l'info est vide ?
        if ($infoExterieur == "") {
            // ajouter une erreur
            Controller::$tabErreur[] = "erreur sur $cle";
        }

        return $infoExterieur;
    }

    static function filtrerUpload ($cle)
    {
        // On récupère le nom actuel du fichier temporaire
        $fichierTmp = $_FILES["$cle"]["tmp_name"];

        // On génère un nom de fichier
        // On récupère l'extension du fichier uploadé
        // brouette.png -> png
        $extension = pathinfo($_FILES["$cle"]["name"], PATHINFO_EXTENSION);

        // On génère un nom (la chaîne de caractères située avant .extension)
        $nom = md5(uniqid());

        // On fabrique le nom complet
        $fichierDest = "$nom.$extension"; // $nom.".".$extension

        //On vérifie si uploads/images existe
        // __DIR__ contient le chemin complet vers le fichier actuel (add.php)
        if (!file_exists("uploads/images")) {
            // mkdir make directory (crée le dossier)
            mkdir("uploads/images", 0777, true);
        }

        // On souhaite uniquement des images png et jpeg
        if ($_FILES["$cle"]["type"] != "image/png" && $_FILES["$cle"]["type"] != "image/jpeg") {
            // Ici on n'a pas le bon format, on s'arrête
            Controller::$tabErreur[] = "Format d'image non pris en charge";
        }

        // On limite la taille à 1Mo
        // 1Mo = 1 048 576 octets 
        if ($_FILES["$cle"]["size"] > 1048576) {
            // Ici le fichier est plus grand que 1Mo
            Controller::$tabErreur[] = "Le fichier est trop gros";
        }

        if (empty(Controller::$tabErreur)) {

            // Ici tous les contrôles sont passés, on peut copier le fichier vers sa destination définitive
            if (!move_uploaded_file($fichierTmp, "uploads/images/" . $fichierDest)) {
                Controller::$tabErreur[] = "Le transfert du fichier a échoué";
            } 
            else {


                // Manipulation image
                // Créer une miniature carrée 200x200
                // Bonne pratique: si l'image s'appelle brouette.png
                // La miniature s'appellerera 200x200-brouette.png
                $image = "uploads/images/" . $fichierDest;

                // Connaitre la taille du fichier "source"
                $info = getimagesize($image);

                // Connaitre le côté le plus petit et sa taille
                $largeurSource = $info[0];
                $hauteurSource = $info[1];

                // Savoir où se place le coin supérieur gauche du carré source
                // On calcule la moitié de la zone restante après retrait du carré
                // Image horizontale : (largeurImage - largeurCarré) / 2
                // Image verticale : (hauteurImage - hauteurCarré) / 2
                switch ($largeurSource <=> $hauteurSource) {
                    case -1:
                        // Image portrait
                        $tailleCarre = $largeurSource;
                        $src_x = 0;
                        $src_y = ($hauteurSource - $tailleCarre) / 2;
                        break;
                    case 0:
                        // Image carrée
                        $tailleCarre = $largeurSource;
                        $src_x = 0;
                        $src_y = 0;
                        break;
                    case 1:
                        // Image paysage
                        $tailleCarre = $hauteurSource;
                        $src_x = ($largeurSource - $tailleCarre) / 2;
                        $src_y = 0;
                        break;
                }

                // On peut ensuite copier le carré source dans l'image de destination
                // Créer une image en mémoire
                // Equivalent à un nouveau fichier dans un programme de dessin
                $nouvelleImage = imagecreatetruecolor(200, 200);

                // Charger une image existante en mémoire
                // ATTENTION: il faut absolument connaitre le type mime de l'image
                // On teste le type Mime de l'image
                switch ($info["mime"]) {
                        // On liste TOUS les types mime autorisés (png et jpeg)
                    case "image/png":
                        $ancienneImage = imagecreatefrompng($image);
                        break;
                    case "image/jpeg":
                        $ancienneImage = imagecreatefromjpeg($image);
                        break;
                }

                // On copie ancienneImage dans nouvelleImage sans la déformer
                imagecopyresampled(
                    $nouvelleImage, // Image de destination
                    $ancienneImage, // Image source
                    0, // Décalage horiz coin supérieur gauche de l'image de destination
                    0, // Décalage verti coin supérieur gauche de l'image de destination
                    $src_x, // Décalage horiz coin supérieur gauche de l'image source
                    $src_y, // Décalage verti coin supérieur gauche de l'image source
                    200, // Largeur de la zone de destination
                    200, // Hauteur de la zone de destination
                    $tailleCarre, // Largeur de la zone source $info contient les dimensions de l'image source
                    $tailleCarre // Hauteur de la zone source
                );

                // On enregistre l'image sur le serveur
                switch ($info["mime"]) {
                        // On liste TOUS les types mime autorisés (png et jpeg)
                    case "image/png":
                        imagepng($nouvelleImage,"uploads/images/200x200-$fichierDest");
                        break;
                    case "image/jpeg":
                        imagejpeg($nouvelleImage, "uploads/images/200x200-$fichierDest");
                        break;
                }

                // On détruit les images dans la mémoire
                imagedestroy($nouvelleImage);
                imagedestroy($ancienneImage);
            }
        }
        return $fichierDest;
    }

}