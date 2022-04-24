<?php

namespace model;


class Transfert
{


    private  $id;
    private  $expediteurId;
    private  $destinataireId;
    private  $colisId;
    private  $destinationId;
    private  $date;


    /**
     * Class Constructor
     * @param    $id   
     * @param    $expediteurId   
     * @param    $destinataireId   
     * @param    $colisId   
     * @param    $destinationId   
     * @param    $date   
     */
    public function __construct($id, $expediteurId, $destinataireId, $colisId, $destinationId, $date)
    {
        $this->id = $id;
        $this->expediteurId = $expediteurId;
        $this->destinataireId = $destinataireId;
        $this->colisId = $colisId;
        $this->destinationId = $destinationId;
        $this->date = $date;
    }

    public  function isNotEmpty()
    {

        if (
            !empty($this->expediteurId) and !empty($this->date) and !empty($this->destinataireId) and !empty($this->colisId) and !empty($this->destinationId)
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
    public function getExpediteurId()
    {
        return $this->expediteurId;
    }

    /**
     * @param mixed $expediteurId
     *
     * @return self
     */
    public function setExpediteurId($expediteurId)
    {
        $this->expediteurId = $expediteurId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDestinataireId()
    {
        return $this->destinataireId;
    }

    /**
     * @param mixed $destinataireId
     *
     * @return self
     */
    public function setDestinataireId($destinataireId)
    {
        $this->destinataireId = $destinataireId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getColisId()
    {
        return $this->colisId;
    }

    /**
     * @param mixed $colisId
     *
     * @return self
     */
    public function setColisId($colisId)
    {
        $this->colisId = $colisId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDestinationId()
    {
        return $this->destinationId;
    }

    /**
     * @param mixed $destinationId
     *
     * @return self
     */
    public function setDestinationId($destinationId)
    {
        $this->destinationId = $destinationId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     *
     * @return self
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }
}
