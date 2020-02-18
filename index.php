<?php

use PWD3\Autoloader;
use PWD3\Bibliotheque;
use PWD3\Livre;

session_start();

require_once("donnees.php");

require_once("class/Autoloader.class.php");
Autoloader::register();

$_SESSION["bibliotheque"] = new Bibliotheque;
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliotheque</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- Enregistrement des livres dans la bibliothèque -->
    <?php
    ob_start();
    if (empty($_SESSION["bibliotheque"]->livres)) {
    ?>
        <h2>Enregistrement des livres</h2>
        <div class="enregistrement">
            <?php
            $i = 0;
            foreach ($listeLivres as $l) :
                if (is_int($l["annee"])) :
                    $livres[$i] = new Livre($l["titre"], $l["auteur"], $l["annee"]);

                    if ($livres[$i] !== null) :
                        $_SESSION["bibliotheque"]->ajouterLivre($livres[$i]);
                    endif;
                endif;
                $i++;
            endforeach; ?>
        </div>
        <hr>
    <?php $enregistrement = ob_get_contents();
        ob_clean();
    } ?>


    <h1 style="display: inline">Bibliothèque</h1>
    <!-- <pre><?= var_dump($_SESSION["bibliotheque"]) ?></pre> -->

    <!-- Boutton Reset -->
    <form style="display: inline; padding-left: 20px;" action="" method="post">
        <input style="display: inline" type="submit" name="reset" value="Reset">
    </form>
    <?php if (isset($_POST["reset"])) {
        session_destroy();
        $enregistrement;
    } ?>
    <hr>

    <!-- Formulaires de recherche de Livres -->
    <h2>Livres de la bibliothèque</h2>
    <form action="" method="POST">
        <label for="annee">
            Recherche par année de publication : <input type="number" id="annee" name="annee">
        </label>
        <input type="submit" name="rechercheAnnee" value="Rechercher">
    </form>
    <form action="" method="POST">
        <label for="titre">
            Recherche par Titre : <input type="text" id="titre" name="titre">
        </label>
        <input type="submit" name="rechercheTitre" value="Rechercher">
    </form>
    <form action="" method="POST">
        <input type="submit" name="voirLivres" value="Voir tout les livres">
    </form>
    <?php
    // Si on recherche par année
    if (isset($_POST["rechercheAnnee"])) :
        if ($_POST["annee"] == "") $_POST["annee"] = 0;
        foreach ($_SESSION["bibliotheque"]->rechercheAnneePublication($_POST["annee"]) as $livre) : ?>
            <div class="boite">
                <p><?= $livre->getTitre() ?></p>
                <p><?= $livre->getAuteur() ?></p>
                <p><?= $livre->getAnneePublication() ?></p>
            </div>
        <?php endforeach;
    endif;

    // Si on recherche par titre
    if (isset($_POST["rechercheTitre"])) :
        foreach ($_SESSION["bibliotheque"]->rechercheTitreContient($_POST["titre"]) as $livre) : ?>
            <div class="boite">
                <p><?= $livre->getTitre() ?></p>
                <p><?= $livre->getAuteur() ?></p>
                <p><?= $livre->getAnneePublication() ?></p>
            </div>
        <?php endforeach;
    endif;

    // Si on veut afficher tout les Livres
    if (isset($_POST["voirLivres"])) :
        foreach ($_SESSION["bibliotheque"]->getLivres() as $livre) : ?>
            <div class="boite">
                <p><?= $livre->getTitre() ?></p>
                <p><?= $livre->getAuteur() ?></p>
                <p><?= $livre->getAnneePublication() ?></p>
            </div>
    <?php endforeach;
    endif; ?>
    <hr>

    <!-- Ajout de livres -->
    <h2>Ajouter un livre</h2>
    <form action="" method="post">
        <label for="titreAjout">Titre : <input type="text" id="titreAjout" name="titreAjout"></label><br>
        <label for="auteurAjout">Auteur : <input type="text" id="auteurAjout" name="auteurAjout"></label><br>
        <label for="anneeAjout">Année : <input type="number" id="anneeAjout" name="anneeAjout"></label><br>
        <input type="submit" value="Ajouter" name="ajout">
    </form>

    <?php // Si on clique sur le boutton Ajouter
    if (isset($_POST["ajout"])) {
        $nouveauLivre = new Livre($_POST["titreAjout"], $_POST["auteurAjout"], $_POST["anneeAjout"]);

        $_SESSION["bibliotheque"]->ajouterLivre($nouveauLivre);

        foreach ($_SESSION["bibliotheque"]->getLivres() as $livre) : ?>
            <div class="boite">
                <p><?= $livre->getTitre() ?></p>
                <p><?= $livre->getAuteur() ?></p>
                <p><?= $livre->getAnneePublication() ?></p>
            </div>
    <?php endforeach;
    }
    ?>
    <hr>

    <!-- Suppresion de livres -->
    <h2>Supprimer un livre</h2>
    <form action="" method="POST">
        <label for="livre">Livre à supprimmer
            <select name="livre" id="livre">
                <?php
                $i = 0;
                foreach ($_SESSION["bibliotheque"]->getLivres() as $livre) : ?>
                    <option value="<?= $i ?>"><?= $livre->getTitre() ?></option>
                <?php $i++;
                endforeach; ?>
            </select>
        </label>
        <input type="submit" name="supprimmer" value="Supprimer">
    </form>

    <?php
    // Si on a cliquer sur sur le boutton Supprimmer
    if (isset($_POST["supprimmer"])) {
        $i = 0;
        foreach ($_SESSION["bibliotheque"]->getLivres() as $livre) {
            if ($i == $_POST['livre']) {
                $_SESSION["bibliotheque"]->supprimerLivre($livre);
            }
            $i++;
        }

        foreach ($_SESSION["bibliotheque"]->getLivres() as $livre) : ?>
            <div class="boite">
                <p><?= $livre->getTitre() ?></p>
                <p><?= $livre->getAuteur() ?></p>
                <p><?= $livre->getAnneePublication() ?></p>
            </div>
    <?php endforeach;
    } ?>
    <hr>
</body>

</html>