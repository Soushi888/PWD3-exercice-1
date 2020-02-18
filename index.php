<?php

use PWD3\Autoloader;
use PWD3\Bibliotheque;
use PWD3\Livre;

require_once("donnees.php");

require_once("class/Autoloader.class.php");
Autoloader::register();

$bibliotheque = new Bibliotheque;

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
    <h1>Bibliothèque</h1>
    <?php
    // Enregistrement des livres dans la bibliothèque
    $i = 0;
    foreach ($listeLivres as $l) :
        if (is_int($l["annee"])) :
            $livres[$i] = new Livre($l["titre"], $l["auteur"], $l["annee"]);

            if ($livres[$i] !== null) :
                $bibliotheque->ajouterLivre($livres[$i]);
            endif;
        endif;
        $i++;
    endforeach; ?>
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
        foreach ($bibliotheque->rechercheAnneePublication($_POST["annee"]) as $livre) : ?>
            <div class="boite">
                <p><?= $livre->getTitre() ?></p>
                <p><?= $livre->getAuteur() ?></p>
                <p><?= $livre->getAnneePublication() ?></p>
            </div>
        <?php endforeach;
    endif;

    // Si on recherche par titre
    if (isset($_POST["rechercheTitre"])) :
        foreach ($bibliotheque->rechercheTitreContient($_POST["titre"]) as $livre) : ?>
            <div class="boite">
                <p><?= $livre->getTitre() ?></p>
                <p><?= $livre->getAuteur() ?></p>
                <p><?= $livre->getAnneePublication() ?></p>
            </div>
        <?php endforeach;
    endif;

    // Si on veut afficher tout les Livres
    if (isset($_POST["voirLivres"])) :
        foreach ($bibliotheque->getLivres() as $livre) : ?>
            <div class="boite">
                <p><?= $livre->getTitre() ?></p>
                <p><?= $livre->getAuteur() ?></p>
                <p><?= $livre->getAnneePublication() ?></p>
            </div>
    <?php endforeach;
    endif; ?>
    <hr>

    <!-- Suppresion de livre -->
    <h2>Supprimer un livre</h2>
    <form action="" method="POST">
        <label for="livre">Livre à supprimmer
            <select name="livre" id="livre">
                <?php
                $i = 0;
                foreach ($bibliotheque->getLivres() as $livre) : ?>
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
        foreach ($bibliotheque->getLivres() as $livre) {
            if ($i == $_POST['livre']) {
                $bibliotheque->supprimerLivre($livre);
            }
            $i++;
        }

        foreach ($bibliotheque->getLivres() as $livre) : ?>
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