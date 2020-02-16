<?php

use PWD3\Autoloader;
use PWD3\Bibliotheque;
use PWD3\Livre;

require_once("donnees.php");

require_once("class/Autoloader.class.php");
Autoloader::register();

$bibliotheque = new Bibliotheque;

$i = 0;
foreach ($listeLivres as $l) {
    if (is_int($l["annee"])) {
        $livres[$i] = new Livre($l["titre"], $l["auteur"], $l["annee"]);

        if ($livres[$i] !== null) {
            echo "<br>" . $l["titre"] . "<br>" . $l["auteur"] . "<br>" . $l["annee"] . "<br>"; 
            $bibliotheque->ajouterLivre($livres[$i]);
            echo "<hr>";
        }
    }

    $i++;
}


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
    <p> <?= $livres[12]->getTitre(); ?></p>
    <?php var_dump($bibliotheque->supprimerLivre($livres[12])) ?>
    <pre><?= var_dump($bibliotheque) ?></pre>

</body>

</html>