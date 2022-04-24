<?php

namespace service;

use model\Destination;
use dao\DbConnection;

class DestinationService
{


	public static function all()
	{

		$query = DbConnection::getConnection()->query("SELECT * FROM destination");

		return $query->fetchall();
	}

	public static function add(Destination $destination)
	{

		$depart = $destination->getDepart();
		$arrivee = $destination->getArrivee();
		$tarif = $destination->getTarif();

		$stmt = DbConnection::getConnection()->prepare("INSERT INTO destination(depart,arrivee,tarif) VALUES(:libelle,:tarif)");
		$stmt->bindParam(':depart', $depart);
		$stmt->bindParam(':arrivee', $arrivee);
		$stmt->bindParam(':tarif', $tarif);
		$stmt->execute();
	}

	public static function update(Destination $destination)
	{

		$id = $destination->getId();
		$depart = $destination->getDepart();
		$arrivee = $destination->getArrivee();
		$tarif = $destination->getTarif();

		$stmt = DbConnection::getConnection()->prepare("UPDATE destination SET libelle=:libelle,tarif=:tarif WHERE id=:id ");
		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':depart', $depart);
		$stmt->bindParam(':arrivee', $arrivee);
		$stmt->bindParam(':tarif', $tarif);
		$stmt->execute();
	}


	public static function delete($id)
	{

		$stmt = DbConnection::getConnection()->prepare("DELETE FROM destination WHERE id =:id");
		$stmt->bindParam(':id', $id);

		$stmt->execute();
	}

	public static function one($id)
	{

		$stmt = DbConnection::getConnection()->prepare("SELECT * FROM destination WHERE id =:id");
		$stmt->bindParam(':id', $id);

		$stmt->execute();

		return $stmt->fetchObject(__CLASS__);
	}
}
