<?php

namespace PWD3;

/**
 * Class Bibliotheque
 */
class Bibliotheque
{
    private $livres;

    /**
     * @return array Liste de tout les livres de la bibliothèque.
     */
    public function getLivres()
    {
        return $this->livres;
    }

    /**
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
     * @param object $livre
     * 
     * @return bool
     */
    public function ajouterLivre(object $livre)
    {
        # code...
    }

    /**
     * @param object $livre
     * 
     * @return bool
     */
    function supprimerLivre(object $livre)
    {
        # code...
    }
}
