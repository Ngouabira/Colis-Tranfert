<?php

namespace service;

use model\Transfert;
use dao\DbConnection;


class TransfertService
{


	public static function all()
	{


		$query = DbConnection::getConnection()->query("SELECT * FROM transfert");

		return $query->fetchall();
	}

	public static function add(Transfert $transfert)
	{

		$expediteurId = $transfert->getExpediteurId();
		$destinataireId = $transfert->getDestinataireId();
		$colisId = $transfert->getColisId();
		$destinationId = $transfert->getDestinationId();
		$date = $transfert->getDate();

		$stmt = DbConnection::getConnection()->prepare("INSERT INTO transfert(expediteurId,destinataireId,colisId,destinationId,dateTransfert,) VALUES(:expediteurId,:destinataireId,:colisId,:destinationId,:dateTransfert)");

		$stmt->bindParam(':expediteurId', $expediteurId);
		$stmt->bindParam(':destinationId', $destinationId);
		$stmt->bindParam(':colisId', $colisId);
		$stmt->bindParam(':destinataireId', $destinataireId);
		$stmt->bindParam(':dateTransfert', $date);
		$stmt->execute();
	}

	public static function update(Transfert $transfert)
	{

		$id = $transfert->getId();
		$expediteurId = $transfert->getExpediteurId();
		$destinataireId = $transfert->getDestinataireId();
		$colisId = $transfert->getColisId();
		$destinationId = $transfert->getDestinationId();
		$date = $transfert->getDate();

		$stmt = DbConnection::getConnection()->prepare("UPDATE transfert SET expediteurId=:expediteurId,destinataireId=:destinataireId,colisId=:colisId,destinationId=:destinationId,dateTransfert=:dateTransfert WHERE id=:id ");

		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':expediteurId', $expediteurId);
		$stmt->bindParam(':destinationId', $destinationId);
		$stmt->bindParam(':colisId', $colisId);
		$stmt->bindParam(':destinataireId', $destinataireId);
		$stmt->bindParam(':dateTransfert', $date);

		$stmt->execute();
	}


	public static function delete($id)
	{

		$stmt = DbConnection::getConnection()->prepare("DELETE FROM transfert WHERE id =:id");
		$stmt->bindParam(':id', $id);

		$stmt->execute();
	}

	public static function one($id)
	{

		$stmt = DbConnection::getConnection()->prepare("SELECT * FROM transfert WHERE id =:id");
		$stmt->bindParam(':id', $id);

		$stmt->execute();

		return $stmt->fetchObject(__CLASS__);
	}
}
