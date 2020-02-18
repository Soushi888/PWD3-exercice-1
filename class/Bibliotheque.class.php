<?php

namespace PWD3;

/**
 * Class Bibliotheque
 */
class Bibliotheque
{
    /**
     * @var array tableau d'objets Livre
     */
    private $livres = [];

    /**
     * getLivres
     * @return array Liste de tout les livres de la bibliothèque.
     */
    public function getLivres()
    {
        return $this->livres;
    }

    /**
     * rechercheAnneePublication
     * @param integer $anneePublication
     * 
     * @return array tableau d'objets Livre
     */
    public function rechercheAnneePublication(int $anneePublication = 0)
    {
        $livresCorrespondants = [];

        if ($anneePublication == 0) : ?>
            <p class="erreur">Veuillez faire une recherche</p>
        <?php endif;

        foreach ($this->livres as $livre) {
            if ($livre->getAnneePublication() == $anneePublication) {
                $livresCorrespondants[] = $livre;
            }
        }
        return $livresCorrespondants;
    }

    /**
     * @param string $chaine string recherché parmis les titres des objets Livre
     * 
     * @return array tableau d'objets Livre contenant $chaine
     */
    public function rechercheTitreContient(string $chaine = "")
    {
        $livresCorrespondants = [];

        if ($chaine == "") : ?>
            <p class="erreur">Veuillez faire une recherche</p>
        <?php return $livresCorrespondants;
        endif;

        $chaine = strtolower($chaine);

        foreach ($this->livres as $livre) {
            $titreLivre = strtolower($livre->getTitre());
            if (strstr($titreLivre, $chaine)) {
                $livresCorrespondants[] = $livre;
            }
        }
        return $livresCorrespondants;
    }

    /**
     * ajouterLivre
     * Ajoute un objet Livre dans $this->livres
     * @param object $livre
     * 
     * @return bool
     */
    public function ajouterLivre(object $livre)
    {
        $err = 0;

        foreach ($this->livres as $livreDejaEnregistre) {
            if ($livre == $livreDejaEnregistre) {
                $err++;
            }
        }

        if ($err == 0) :
            $this->livres[] = $livre; ?>
            <p class="succes">Livre bien enregistré !</p>
        <?php return true;
        else : ?>
            <p class="erreur">Livre déjà enregistré.</p>
        <?php return false;
        endif;
    }

    /**
     * Supprime un objet Livre de $this->livres
     * @param object $livre
     * 
     * @return bool
     */
    function supprimerLivre(object $livre)
    {
        $i = 0;
        foreach ($this->livres as $livreDejaEnregistre) : ?>
            <?php if ($livre == $livreDejaEnregistre) :
                unset($this->livres[$i]); ?>
                <p class="succes">Supression bien effectuée du livre <?= $livre->getTitre() ?>!</p>
<?php return true;
            endif;
            $i++;
        endforeach;
        return false;
    }
}
