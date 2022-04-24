<?php 
namespace model;

class Ville {

	private $id;
	private $libelle;
    private $tarif;


    /**
     * Class Constructor
     * @param    $id   
     * @param    $libelle   
     * @param    $tarif   
     */
    public function __construct($id, $libelle, $tarif)
    {
        $this->id = $id;
        $this->libelle = $libelle;
        $this->tarif = $tarif;
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
}










 ?>
