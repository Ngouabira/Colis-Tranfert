<?php

namespace service;

use model\Expediteur;
use dao\DbConnection;

class ExpediteurService
{


    /**
     * TODO: Cette methode permet de retourner tous les expediteurs
     */
    public static function all()
    {

        $query = DbConnection::getConnection()->query("SELECT * FROM expediteur");

        return $query->fetchall();
    }

    public static function add(Expediteur $expediteur)
    {

        $email = $expediteur->getEmail();
        $nom = $expediteur->getNom();
        $prenom = $expediteur->getPrenom();
        $genre = $expediteur->getGenre();
        $telephone = $expediteur->getTelephone();
        $email = $expediteur->getEmail();
        $adresse = $expediteur->getAdresse();
        $cni = $expediteur->getCni();

        $stmt = DbConnection::getConnection()->prepare("INSERT INTO expediteur(nom,prenom,genre,telephone,email,adresse,cni) VALUES(:nom,:prenom,:genre,:telephone,:email,:adresse,:cni)");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':genre', $genre);
        $stmt->bindParam(':telephone', $telephone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':adresse', $adresse);
        $stmt->bindParam(':cni', $cni);
        $stmt->execute();
    }

    public static function update(Expediteur $expediteur)
    {

        $id = $expediteur->getId();
        $email = $expediteur->getEmail();
        $nom = $expediteur->getNom();
        $prenom = $expediteur->getPrenom();
        $genre = $expediteur->getGenre();
        $telephone = $expediteur->getTelephone();
        $email = $expediteur->getEmail();
        $adresse = $expediteur->getAdresse();
        $cni = $expediteur->getCni();

        $stmt = DbConnection::getConnection()->prepare("UPDATE expediteur SET nom=:nom,prenom=:prenom,genre=:genre,telephone=:telephone,email=:email,adresse=:adresse,cni=:cni WHERE id=:id ");

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':genre', $genre);
        $stmt->bindParam(':telephone', $telephone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':adresse', $adresse);
        $stmt->bindParam(':cni', $cni);

        $stmt->execute();
    }


    public static function delete($id)
    {

        $stmt = DbConnection::getConnection()->prepare("DELETE FROM expediteur WHERE id =:id");
        $stmt->bindParam(':id', $id);

        $stmt->execute();
    }

    public static function one($id)
    {

        $stmt = DbConnection::getConnection()->prepare("SELECT * FROM expediteur WHERE id =:id");
        $stmt->bindParam(':id', $id);

        $stmt->execute();

        return $stmt->fetchObject(__CLASS__);
    }
}
