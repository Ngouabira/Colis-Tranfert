
<?php

namespace model;

class Destinataire
{

	private $id;
	private $nom;
	private $prenom;
	private $genre;
	private $telephone;
	private $email;


	public  function isNotEmpty()
	{

		if (
			!empty($this->nom) and !empty($this->prenom) and !empty($this->genre) and !empty($this->telephone)
			and !empty($this->email)
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
	 */
	public function __construct($id, $nom, $prenom, $genre, $telephone, $email)
	{
		$this->id = $id;
		$this->nom = $nom;
		$this->prenom = $prenom;
		$this->genre = $genre;
		$this->telephone = $telephone;
		$this->email = $email;
	}



	/**
	 * Get the value of id
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set the value of id
	 *
	 * @return  self
	 */
	public function setId($id)
	{
		$this->id = $id;

		return $this;
	}

	/**
	 * Get the value of nom
	 */
	public function getNom()
	{
		return $this->nom;
	}

	/**
	 * Set the value of nom
	 *
	 * @return  self
	 */
	public function setNom($nom)
	{
		$this->nom = $nom;

		return $this;
	}

	/**
	 * Get the value of prenom
	 */
	public function getPrenom()
	{
		return $this->prenom;
	}

	/**
	 * Set the value of prenom
	 *
	 * @return  self
	 */
	public function setPrenom($prenom)
	{
		$this->prenom = $prenom;

		return $this;
	}

	/**
	 * Get the value of genre
	 */
	public function getGenre()
	{
		return $this->genre;
	}

	/**
	 * Set the value of genre
	 *
	 * @return  self
	 */
	public function setGenre($genre)
	{
		$this->genre = $genre;

		return $this;
	}

	/**
	 * Get the value of telephone
	 */
	public function getTelephone()
	{
		return $this->telephone;
	}

	/**
	 * Set the value of telephone
	 *
	 * @return  self
	 */
	public function setTelephone($telephone)
	{
		$this->telephone = $telephone;

		return $this;
	}

	/**
	 * Get the value of email
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * Set the value of email
	 *
	 * @return  self
	 */
	public function setEmail($email)
	{
		$this->email = $email;

		return $this;
	}
}







?>