<?php

namespace service;

use model\Ville;
use dao\DbConnection;

class VilleService
{


	public static function all()
	{

		$query = DbConnection::getConnection()->query("SELECT * FROM ville");

		return $query->fetchall();
	}

	public static function add(Ville $ville)
	{

		$libelle = $ville->getlibelle();
		$tarif = $ville->getTarif();

		$stmt = DbConnection::getConnection()->prepare("INSERT INTO ville(libelle,tarif) VALUES(:libelle,:tarif)");
		$stmt->bindParam(':libelle', $libelle);
		$stmt->bindParam(':tarif', $tarif);
		$stmt->execute();
	}

	public static function update(Ville $ville)
	{

		$id = $ville->getId();
		$libelle = $ville->getlibelle();
		$tarif = $ville->getTarif();

		$stmt = DbConnection::getConnection()->prepare("UPDATE ville SET libelle=:libelle,tarif=:tarif WHERE id=:id ");
		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':libelle', $libelle);
		$stmt->bindParam(':tarif', $tarif);
		$stmt->execute();
	}


	public static function delete($id)
	{

		$stmt = DbConnection::getConnection()->prepare("DELETE FROM ville WHERE id =:id");
		$stmt->bindParam(':id', $id);

		$stmt->execute();
	}

	public static function one($id)
	{

		$stmt = DbConnection::getConnection()->prepare("SELECT * FROM ville WHERE id =:id");
		$stmt->bindParam(':id', $id);

		$stmt->execute();

		return $stmt->fetchObject(__CLASS__);
	}
}
