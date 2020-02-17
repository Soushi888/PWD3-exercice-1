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
    <h2>Enregistrement des livres</h2>
    <?php
    // Enregistrement des livres dans la bibliothèque
    $i = 0;
    foreach ($listeLivres as $l) :
        if (is_int($l["annee"])) :
            $livres[$i] = new Livre($l["titre"], $l["auteur"], $l["annee"]);

            if ($livres[$i] !== null) : ?>
                <div class="boite">
                    <p><?= $l["titre"] ?></p>
                    <p><?= $l["auteur"] ?></p>
                    <p><?= $l["annee"] ?></p>
                    <?php $bibliotheque->ajouterLivre($livres[$i]); ?>
                </div>
    <?php endif;
        endif;
        $i++;
    endforeach; ?>
    <hr>

    <h2>Livres de la bibliothèque</h2>
    <form action="" method="POST">
        <input type="submit" name="voirLivres" value="Voir les livres">
    </form>
    <?php if (isset($_POST["voirLivres"])) :
        $i = 0;
        foreach ($bibliotheque->getLivres() as $livre) : ?>
            <div class="boite">
                <p><?= $livre->getTitre() ?></p>
                <p><?= $livre->getAuteur() ?></p>
                <p><?= $livre->getAnneePublication() ?></p>
            </div>
    <?php endforeach;
    endif; ?>
    <hr>
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
    <pre><?= var_dump($_POST); ?></pre>
    <?php 
    
    if (isset($_POST["supprimmer"])) {
        echo "Hello !";
    } ?>
    <hr>
</body>

</html>