<?php

namespace controller;

use model\Destinataire;
use service\DestinataireService;

class DestinataireController
{
    public static function controllerManager()
    {

        $action = isset($_GET['action']) ? $_GET['action'] : NULL;

        switch ($action) {
            case 'all':
                self::all();
                break;
            case 'add':
                self::add();
                break;
            case 'update':
                self::update();
                break;
            case 'delete':
                self::delete();
                break;
            case 'one':
                self::one();
                break;

            default:
                return "Error";
                break;
        }
    }

    public static function all()
    {

        echo json_encode(DestinataireService::all());
    }

    public static function add()
    {


        extract($_POST);

        $destinataire = new Destinataire(null, $nom, $prenom, $genre, $telephone, $email);

        if ($destinataire->isNotEmpty()) {

            if ($destinataire->emailIsValid()) {

                DestinataireService::add($destinataire);

                echo "OK";
            } else {

                echo "Email invalide";
            }
        } else {

            echo "Veuillez remplir tous les champs";
        }
    }

    public static function update()
    {

        extract($_GET);
        extract($_POST);

        $destinataire = new Destinataire($id, $nom, $prenom, $genre, $telephone, $email);

        if ($destinataire->isNotEmpty()) {

            if ($destinataire->emailIsValid()) {

                DestinataireService::update($destinataire);

                echo "OK";
            } else {

                echo "Email invalide";
            }
        } else {

            echo "Veuillez remplir tous les champs";
        }
    }


    public static function delete()
    {

        extract($_GET);
        DestinataireService::delete($id);
    }

    public static function one()
    {

        extract($_GET);
        echo json_encode(DestinataireService::one($id));
    }
}

DestinataireController::controllerManager();
