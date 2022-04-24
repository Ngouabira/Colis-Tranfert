<?php

namespace model;

class Colis
{


    private $id;
    private $poids;
    private $libelle;
    private $description;
    private $expediteurId;


    /**
     * Class Constructor
     * @param    $id   
     * @param    $poids   
     * @param    $libelle   
     * @param    $description   
     */
    public function __construct($id, $poids, $libelle, $description, $expediteurId)
    {
        $this->id = $id;
        $this->poids = $poids;
        $this->libelle = $libelle;
        $this->description = $description;
        $this->expediteurId = $expediteurId;
    }

    public  function isNotEmpty()
    {

        if (
            !empty($this->poids) and !empty($this->expediteurId) and !empty($this->libelle) and !empty($this->description)
        ) {

            return true;
        } else {

            return false;
        }
    }



    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPoids()
    {
        return $this->poids;
    }

    /**
     * @param mixed $poids
     *
     * @return self
     */
    public function setPoids($poids)
    {
        $this->poids = $poids;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param mixed $libelle
     *
     * @return self
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of expediteurId
     */
    public function getExpediteurId()
    {
        return $this->expediteurId;
    }

    /**
     * Set the value of expediteurId
     *
     * @return  self
     */
    public function setExpediteurId($expediteurId)
    {
        $this->expediteurId = $expediteurId;

        return $this;
    }
}
