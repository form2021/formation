<?php 

// EN PHP CLASSIQUE: CONCATENATION DE FICHIERS
// require_once "includes/header.php"; 
// require_once "includes/section.php"; 
// require_once "includes/footer.php" ;

// AVEC PLUSIEURS VARIABLES
$header =
<<<html
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <header>
            <strong>exemple page</strong>
        </header>
        <main>
html;

$section =
<<<html
    <section>
    <h1>titre section</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quibusdam velit. Porro nihil exercitationem eum, ipsa recusandae dolor at dolore tempore alias? Cumque ipsam commodi, fugit ex nostrum eos vel!</p>
    </section>
html;

$footer = 
<<<html

        </main>
        <footer>
            <p>tous droits réservés</p>
        </footer>
    </body>
    </html>

html;

// CONCATENATION AVEC OPERATEUR .
// echo $header . $section . $footer;

// ECRITURE SIMPLIFIEE
// echo "$header$section$footer";

// ECRITURE PLUS LISIBLE AVEC HEREDOC
// echo
// <<<x
// $header
// $section
// $footer
// x;

// EN POO
class Header
{
    // METHODE MAGIQUE __toString
    function __toString()
    {
        return <<<x
            <!DOCTYPE html>
            <html lang="fr">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
            </head>
            <body>
                <header>
                    <strong>exemple page</strong>
                </header>
                <main>
        x;
    }
}

class Section
{
    // METHODE MAGIQUE __toString
    function __toString()
    {
        return <<<x
            <section>
            <h1>titre section</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quibusdam velit. Porro nihil exercitationem eum, ipsa recusandae dolor at dolore tempore alias? Cumque ipsam commodi, fugit ex nostrum eos vel!</p>
            </section>
        x;
    }

}

// DEV1 QUI CODE LA CLASSE (PLUS DIFFICILE)
class Footer
{
    // METHODE MAGIQUE __toString
    function __toString()
    {
        return <<<x
                </main>
                <footer>
                    <p>tous droits réservés</p>
                </footer>
            </body>
            </html>
        x;
    }

}

// DEV2 QUI UTILISE LA CLASSE (PLUS FACILE)
// JE CREE LES OBJETS
$header     = new Header;
$section    = new Section;
$footer     = new Footer;   

// AVEC __toString JE PEUX UTILISER UN OBJET COMME UN TEXTE
// ECRITURE PLUS LISIBLE AVEC HEREDOC
echo
<<<x
$header
$section
$footer
x;

?>