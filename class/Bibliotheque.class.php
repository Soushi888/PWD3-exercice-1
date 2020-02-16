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
    public function rechercheAnneePublication(int $anneePublication)
    {
    }

    /**
     * @param string $chaine
     * 
     * @return array tableau d'objets Livre
     */
    public function rechercheTitreContient(string $chaine)
    {
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
        foreach ($this->livres as $livreDejaEnregistre) {
            if ($livre == $livreDejaEnregistre) :
                var_dump($livreDejaEnregistre);
                unset($livreDejaEnregistre); ?>
                <p class="succes">Supression bien effectuée !</p>
<?php return true;
            else :
                return false;
            endif;
        }
    }
}
