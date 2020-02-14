<?php

namespace PWD3;

/**
 * Class Livre
 */
class Livre
{
    private $titre;
    private $auteur;
    private $anneePublication;

    private $erreurs = [];

    /**
     * @param string $titre
     * @param string $auteur
     * @param integer $anneePublication
     * 
     * @return void
     */
    public function __construct(string $titre, string $auteur, int $anneePublication)
    {
        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->anneePublication = $anneePublication;
    }

    /**
     * Getter magique
     * @param mixed $prop propriété à ascesser
     * 
     * @return mixed valeur de la propriété envoyée en paramètre
     */
    // public function __get($prop)
    // {
    //     return $this->$prop;
    // }

    /**
     * @return string titre de l'objet Livre
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @return string auteur de l'objet Livre
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * @return string anneePublication de l'objet Livre
     */
    public function getAnneePublication()
    {
        return $this->anneePublication;
    }

    /**
     * Setter magique
     * @param mixed $prop propriété
     * @param mixed $val valeur
     * 
     * @return void
     */
    public function __set($prop, $val)
    {
        $setProperty = 'set' . ucfirst($prop);
        $this->$setProperty($val);
    }


    /**
     * @param string $titre
     * 
     * @return bool
     */
    public function setTitre(string $titre)
    {
        $regEx = "";
        $this->titre = $titre;
    }


    /**
     * @param string $auteur
     * 
     * @return bool
     */
    public function setAuteur(string $auteur)
    {
        $regEx = "";
        $this->auteur = $auteur;
    }


    /**
     * @param integer $anneePublication
     * 
     * @return bool
     */
    public function setAnneePublication(int $anneePublication)
    {
        if (strlen($anneePublication) == 4 && $anneePublication >= 1900 && $anneePublication > date("Y")) {
            $this->anneePublication = $anneePublication;
            return true;
        } else {
            $this->erreurs["annee_publication"] = "Année incorecte";
            return false;
        }
    }
}
