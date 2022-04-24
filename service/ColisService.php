<?php

namespace service;

use model\Colis;
use dao\DbConnection;

class ColisService
{


	public static function all()
	{

		$query = DbConnection::getConnection()->query("SELECT * FROM colis");

		return $query->fetchall();
	}

	public static function add(Colis $colis)
	{

		$poids = $colis->getPoids();
		$libelle = $colis->getLibelle();
		$description = $colis->getDescription();
		$expediteurId = $colis->getExpediteurId();

		$stmt = DbConnection::getConnection()->prepare("INSERT INTO colis(poids,libelle,descripcion,expediteurId) VALUES(:poids,:libelle,:descripcion)");
		$stmt->bindParam(':poids', $poids);
		$stmt->bindParam(':libelle', $libelle);
		$stmt->bindParam(':description', $description);
		$stmt->bindParam(':expediteurId', $expediteurId);
		$stmt->execute();
	}
	public static function update(Colis $colis)
	{

		$id = $colis->getId();
		$poids = $colis->getPoids();
		$libelle = $colis->getLibelle();
		$description = $colis->getDescription();
		$expediteurId = $colis->getExpediteurId();

		$stmt = DbConnection::getConnection()->prepare("UPDATE colis SET poids=:poids,libelle=:libelle, descripcion=:descripcion, expediteurId=:expediteurId WHERE id=:id");

		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':poids', $poids);
		$stmt->bindParam(':libelle', $libelle);
		$stmt->bindParam(':descripcion', $description);
		$stmt->bindParam(':expediteurId', $expediteurId);

		$stmt->execute();
	}

	public static function delete($id)
	{

		$stmt = DbConnection::getConnection()->prepare("DELETE FROM colis WHERE id =:id");
		$stmt->bindParam(':id', $id);

		$stmt->execute();
	}

	public static function one($id)
	{

		$stmt = DbConnection::getConnection()->prepare("SELECT * FROM colis WHERE id =:id");
		$stmt->bindParam(':id', $id);

		$stmt->execute();

		return $stmt->fetchObject(__CLASS__);
	}
}
