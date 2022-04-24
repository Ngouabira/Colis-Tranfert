<?php

namespace service;

use model\Destinataire;
use dao\DbConnection;

class DestinataireService
{


	public static function all()
	{

		$query = DbConnection::getConnection()->query("SELECT * FROM destinataire");

		return $query->fetchall();
	}

	public static function add(Destinataire $destinataire)
	{


		$email = $destinataire->getEmail();
		$nom = $destinataire->getNom();
		$prenom = $destinataire->getPrenom();
		$genre = $destinataire->getGenre();
		$telephone = $destinataire->getTelephone();
		$email = $destinataire->getEmail();


		$stmt = DbConnection::getConnection()->prepare("INSERT INTO destinataire(nom,prenom,genre,telephone,email) VALUES(:nom,:prenom,:genre,:telephone,:email)");
		$stmt->bindParam(':nom', $nom);
		$stmt->bindParam(':prenom', $prenom);
		$stmt->bindParam(':genre', $genre);
		$stmt->bindParam(':telephone', $telephone);
		$stmt->bindParam(':email', $email);
		$stmt->execute();
	}

	public static function update(Destinataire $destinataire)
	{

		$id = $destinataire->getId();
		$email = $destinataire->getEmail();
		$nom = $destinataire->getNom();
		$prenom = $destinataire->getPrenom();
		$genre = $destinataire->getGenre();
		$telephone = $destinataire->getTelephone();
		$email = $destinataire->getEmail();


		$stmt = DbConnection::getConnection()->prepare("UPDATE destinataire SET nom=:nom,prenom=:prenom,genre=:genre,telephone=:telephone,email=:email WHERE id=:id ");

		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':nom', $nom);
		$stmt->bindParam(':prenom', $prenom);
		$stmt->bindParam(':genre', $genre);
		$stmt->bindParam(':telephone', $telephone);
		$stmt->bindParam(':email', $email);

		$stmt->execute();
	}


	public static function delete($id)
	{

		$stmt = DbConnection::getConnection()->prepare("DELETE FROM destinataire WHERE id =:id");
		$stmt->bindParam(':id', $id);

		$stmt->execute();
	}

	public static function one($id)
	{

		$stmt = DbConnection::getConnection()->prepare("SELECT * FROM destinataire WHERE id =:id");
		$stmt->bindParam(':id', $id);

		$stmt->execute();

		return $stmt->fetchObject(__CLASS__);
	}
}
