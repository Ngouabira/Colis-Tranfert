<?php

namespace model;

class Destination
{

    private $id;
    private $depart;
    private $arrivee;
    private $tarif;


    /**
     * Class Constructor
     * @param    $id   
     * @param    $libelle   
     * @param    $tarif   
     */
    public function __construct($id, $tarif, $depart, $arrivee)
    {
        $this->id = $id;
        $this->tarif = $tarif;
        $this->depart = $depart;
        $this->arrivee = $arrivee;
    }

    public  function isNotEmpty()
    {

        if (!empty($this->tarif) and !empty($this->arrivee) and !empty($this->tarif)) {

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
    public function getTarif()
    {
        return $this->tarif;
    }

    /**
     * @param mixed $tarif
     *
     * @return self
     */
    public function setTarif($tarif)
    {
        $this->tarif = $tarif;

        return $this;
    }

    /**
     * Get the value of depart
     */
    public function getDepart()
    {
        return $this->depart;
    }

    /**
     * Set the value of depart
     *
     * @return  self
     */
    public function setDepart($depart)
    {
        $this->depart = $depart;

        return $this;
    }

    /**
     * Get the value of arrivee
     */
    public function getArrivee()
    {
        return $this->arrivee;
    }

    /**
     * Set the value of arrivee
     *
     * @return  self
     */
    public function setArrivee($arrivee)
    {
        $this->arrivee = $arrivee;

        return $this;
    }
}
