<?php

namespace service;

use model\Colis;
use dao\DbConnection;

class ColisService
{


	public function all()
	{

		$query = DbConnection::getConnection()->query("SELECT * FROM colis");

		return $query->fetchall();
	}

	public function add(Colis $colis)
	{

		$poids = $colis->getPoids();
		$libelle = $colis->getLibelle();
		$description = $colis->getDescription();

		$stmt = DbConnection::getConnection()->prepare("INSERT INTO colis(poids,libelle,descripcion) VALUES(:poids,:libelle,:descripcion)");
		$stmt->bindParam(':poids', $poids);
		$stmt->bindParam(':libelle', $libelle);
		$stmt->bindParam(':descripcion', $description);
		$stmt->execute();
	}
	public function update(Colis $colis)
	{

		$id = $colis->getId();
		$poids = $colis->getPoids();
		$libelle = $colis->getLibelle();
		$description = $colis->getDescription();

		$stmt = DbConnection::getConnection()->prepare("UPDATE colis SET poids=:poids,libelle=:libelle, descripcion=:descripcion");

		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':poids', $poids);
		$stmt->bindParam(':libelle', $libelle);
		$stmt->bindParam(':descripcion', $description);

		$stmt->execute();
	}

	public function delete($id)
	{

		$stmt = DbConnection::getConnection()->prepare("DELETE FROM colis WHERE id =:id");
		$stmt->bindParam(':id', $id);

		$stmt->execute();
	}

	public function one($id)
	{

		$stmt = DbConnection::getConnection()->prepare("SELECT * FROM colis WHERE id =:id");
		$stmt->bindParam(':id', $id);

		$stmt->execute();

		return $stmt->fetchObject(__CLASS__);
	}
}
