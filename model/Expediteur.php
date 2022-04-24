<?php

namespace model;

class Expediteur
{

    private $id;
    private $nom;
    private $prenom;
    private $genre;
    private $telephone;
    private $email;
    private $adresse;
    private $cni = "example.php";


    public  function isNotEmpty()
    {

        if (
            !empty($this->nom) and !empty($this->prenom) and !empty($this->genre) and !empty($this->telephone)
            and !empty($this->email) and !empty($this->adresse)
        ) {

            return true;
        } else {

            return false;
        }
    }

    public  function emailIsValid()
    {

        if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {

            return true;
        } else {

            return false;
        }
    }


    /**
     * Class Constructor
     * @param    $id   
     * @param    $nom   
     * @param    $prenom   
     * @param    $genre   
     * @param    $telephone   
     * @param    $email   
     * @param    $adresse   
     * @param    $cni   
     */
    public function __construct($id, $nom, $prenom, $genre, $telephone, $email, $adresse, $cni)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->genre = $genre;
        $this->telephone = $telephone;
        $this->email = $email;
        $this->adresse = $adresse;
        $this->cni = $cni;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     *
     * @return self
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     *
     * @return self
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @param mixed $genre
     *
     * @return self
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param mixed $telephone
     *
     * @return self
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     *
     * @return self
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCni()
    {
        return $this->cni;
    }

    /**
     * @param mixed $cni
     *
     * @return self
     */
    public function setCni($cni)
    {
        $this->cni = $cni;

        return $this;
    }

    /**
     * @return mixed
     */
    public function  getId()
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
}
