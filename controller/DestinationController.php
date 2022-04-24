<?php

namespace controller;

use model\destination;
use service\DestinationService;

class DestinationController
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

        echo json_encode(DestinationService::all());
    }

    public static function add()
    {


        extract($_POST);

        $destination = new Destination(null, $libelle, $poids, $description, $expediteurId);

        if ($destination->isNotEmpty()) {

            DestinationService::add($destination);
        } else {

            echo "Veuillez remplir tous les champs";
        }
    }

    public static function update()
    {

        extract($_GET);
        extract($_POST);

        $destination = new Destination($id, $libelle, $poids, $description, $expediteurId);
        DestinationService::update($destination);
        if ($destination->isNotEmpty()) {
        } else {

            echo "Veuillez remplir tous les champs";
        }
    }


    public static function delete()
    {

        extract($_GET);
        DestinationService::delete($id);
    }

    public static function one()
    {

        extract($_GET);
        echo json_encode(DestinationService::one($id));
    }
}

DestinationController::controllerManager();
